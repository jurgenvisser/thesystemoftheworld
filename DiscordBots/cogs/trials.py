"""
Cog implementation for managing trial memberships on a Discord server.

This cog wraps the trial-related slash commands (``/trial``, ``/endtrial``, ``/triallist`` and
its alias ``/tlist``) from the original monolithic bot into an isolated class. It also
maintains a background task that automatically ends trials once their seven‑day period has
elapsed. All persistent state is stored in a JSON file named ``trials.json`` at the root
of the project.

The cog reads configuration values (guild ID, channel ID, role IDs, etc.) from environment
variables where possible but falls back to the hard‑coded defaults used in the original
``discordbot.py``. This mirrors the behaviour of the original commands while making it
straightforward to override values via a ``.env`` file.
"""

from __future__ import annotations

import os
import json
from datetime import datetime, timedelta, timezone
from typing import Dict, Any

import discord
from discord import app_commands
from discord.ext import commands, tasks
from dotenv import load_dotenv

# Determine the guild object for slash command registration. Commands in this
# cog will be registered to this guild to ensure they appear immediately. If
# ``DISCORD_GUILD_ID`` is not set or invalid, commands remain global and may
# take up to an hour to propagate. See the bot's ``on_ready`` handler for
# synchronization details.
try:
    _GUILD_ID: int | None = int(os.getenv("DISCORD_GUILD_ID")) if os.getenv("DISCORD_GUILD_ID") else None
except (TypeError, ValueError):
    _GUILD_ID = None

# Create a Snowflake object for the guild if an ID is provided. If ``_GUILD_ID`` is None
# then ``_GUILD`` is set to None and the ``guilds`` decorator will still work but commands
# will remain global.
_GUILD = discord.Object(id=_GUILD_ID) if _GUILD_ID else None


class Trials(commands.Cog):
    """A Cog providing commands and background tasks for managing user trial periods."""

    def __init__(self, bot: commands.Bot) -> None:
        self.bot = bot

        # Load environment variables from a .env file if present. This call is idempotent.
        load_dotenv()

        # Guild and role/channel configuration. These mirror the constants in the original bot.
        try:
            self.guild_id: int = int(os.getenv("DISCORD_GUILD_ID"))
        except (TypeError, ValueError):
            self.guild_id = 0

        # Channel used for posting automatic expiry notifications. Use env var if set, else default.
        channel_env = os.getenv("TRIAL_CHANNEL_ID")
        if channel_env is not None:
            try:
                self.channel_id: int = int(channel_env)
            except ValueError:
                self.channel_id = 1410397459326439455
        else:
            self.channel_id = 1410397459326439455

        # Role to assign during trials and role needed to manage trials. Defaults mirror original.
        role_env = os.getenv("TRIAL_ROLE_ID")
        manager_env = os.getenv("TRIAL_MANAGER_ROLE_ID")
        try:
            self.trial_role_id: int = int(role_env) if role_env is not None else 1429196584608071841
        except ValueError:
            self.trial_role_id = 1429196584608071841
        try:
            self.trial_manager_role_id: int = int(manager_env) if manager_env is not None else 1377620953135190127
        except ValueError:
            self.trial_manager_role_id = 1377620953135190127

        # Path to the JSON file storing active trials. Keep it in the project root for consistency.
        base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
        self.trial_file: str = os.path.join(base_dir, "trials.json")

        # Active trials keyed by user ID as a string. Each entry holds role id, username,
        # start time and end time. Datetimes are stored as naive UTC in Python and ISO 8601
        # strings when persisted.
        self.active_trials: Dict[str, Dict[str, Any]] = {}

        # Load any existing trial data from the file on startup.
        self._load_trials()

        # Start the background loop that checks for expired trials. This will run every
        # 30 minutes (matching the original implementation). It begins immediately on
        # cog initialisation and is cancelled in ``cog_unload``.
        self.check_trials.start()

    # ------------------------------------------------------------------
    # Internal persistence helpers
    # ------------------------------------------------------------------
    def _load_trials(self) -> None:
        """Load trial data from the JSON file, converting date strings to ``datetime``."""
        if not os.path.exists(self.trial_file):
            self.active_trials = {}
            return

        try:
            with open(self.trial_file, "r", encoding="utf-8") as fp:
                data = json.load(fp)
            for user_id, trial_info in data.items():
                try:
                    # Convert ISO formatted strings back into aware datetimes in UTC
                    start = datetime.fromisoformat(trial_info["start"])
                    end = datetime.fromisoformat(trial_info["end"])
                    self.active_trials[user_id] = {
                        "role_id": trial_info["role_id"],
                        "username": trial_info["username"],
                        "start": start,
                        "end": end,
                    }
                except Exception:
                    # Skip invalid entries rather than raising; these will be overwritten
                    continue
        except Exception:
            # If the JSON is corrupt, start with an empty dataset
            self.active_trials = {}

    def _save_trials(self) -> None:
        """Write the current trial state to disk as ISO formatted strings."""
        serialisable: Dict[str, Dict[str, Any]] = {}
        for user_id, trial_info in self.active_trials.items():
            serialisable[user_id] = {
                "role_id": trial_info["role_id"],
                "username": trial_info["username"],
                "start": trial_info["start"].isoformat(),
                "end": trial_info["end"].isoformat(),
            }
        with open(self.trial_file, "w", encoding="utf-8") as fp:
            json.dump(serialisable, fp, indent=4)

    # ------------------------------------------------------------------
    # Lifecycle hook
    # ------------------------------------------------------------------
    def cog_unload(self) -> None:
        """Stop the background task when the cog is unloaded."""
        self.check_trials.cancel()

    # ------------------------------------------------------------------
    # Slash command implementations
    # ------------------------------------------------------------------
    @app_commands.command(name="trial", description="Start a 7‑day trial for a user")
    @app_commands.guilds(_GUILD)
    @app_commands.describe(user="The user to start a trial for")
    async def trial(self, interaction: discord.Interaction, user: discord.Member) -> None:
        """Assign the trial role to a user and record the start/end times."""
        guild = interaction.guild
        if guild is None:
            await interaction.response.send_message(
                "This command can only be used in a guild.",
                ephemeral=True,
            )
            return

        # Check permission: the invoking user must have the manager role
        manager_role = guild.get_role(self.trial_manager_role_id)
        if manager_role is None or manager_role not in interaction.user.roles:
            await interaction.response.send_message(
                "You do not have permission to use this command.",
                ephemeral=True,
            )
            return

        # Ensure the bot itself has permission to manage roles
        bot_member = guild.get_member(self.bot.user.id) if self.bot.user else None
        if bot_member is None or not bot_member.guild_permissions.manage_roles:
            await interaction.response.send_message(
                "I do not have permission to manage roles. Please update my permissions.",
                ephemeral=True,
            )
            return

        # Resolve the trial role
        role = guild.get_role(self.trial_role_id)
        if role is None:
            await interaction.response.send_message(
                "Trial role not found. Please check the TRIAL_ROLE_ID.",
                ephemeral=True,
            )
            return

        # If the user already has an active trial, inform the caller
        if str(user.id) in self.active_trials:
            await interaction.response.send_message(
                f"{user.display_name} already has an active trial.",
                ephemeral=True,
            )
            return

        # Attempt to add the role and notify the user via DM
        try:
            await user.add_roles(role, reason="Started 7‑day trial")
            embed = discord.Embed(
                description=(
                    "# Jouw 7 dagen proefperiode is gestart!\n\n"
                    "- Je hebt nu toegang tot exclusieve kanalen en functies.\n"
                    "- Geniet van je proefperiode en ontdek wat onze community te bieden heeft.\n\n"
                    "-# De proefperiode wordt automatisch beëindigd na 7 dagen. Je hoeft hier niets voor te doen.\n"
                    "-# Dit bericht is automatisch verstuurd door een bot en reacties op deze DM kunnen niet worden gelezen."
                ),
                color=discord.Color(int("D9AF5C", 16)),
            )
            try:
                await user.send(embed=embed)
            except discord.Forbidden:
                # User has DMs disabled; silently ignore
                pass
        except discord.Forbidden:
            await interaction.response.send_message(
                "I do not have permission to add roles to this user.",
                ephemeral=True,
            )
            return
        except Exception as exc:
            await interaction.response.send_message(
                f"Failed to add role: {exc}",
                ephemeral=True,
            )
            return

        # Record the trial
        start_time = datetime.now(timezone.utc)
        end_time = start_time + timedelta(days=7)
        self.active_trials[str(user.id)] = {
            "role_id": role.id,
            "username": user.name,
            "start": start_time,
            "end": end_time,
        }
        self._save_trials()

        await interaction.response.send_message(
            f"7 dagen proefperiode gestart voor {user.mention}.",
            suppress_embeds=True,
        )

    @app_commands.command(name="endtrial", description="End an active trial for a user immediately")
    @app_commands.guilds(_GUILD)
    @app_commands.describe(user="The user to end the trial for")
    async def endtrial(self, interaction: discord.Interaction, user: discord.Member) -> None:
        """Manually terminate an active trial and remove the trial role."""
        guild = interaction.guild
        if guild is None:
            await interaction.response.send_message(
                "This command can only be used in a guild.",
                ephemeral=True,
            )
            return

        # Permission check
        manager_role = guild.get_role(self.trial_manager_role_id)
        if manager_role is None or manager_role not in interaction.user.roles:
            await interaction.response.send_message(
                "You do not have permission to use this command.",
                ephemeral=True,
            )
            return

        # Bot must be able to manage roles
        bot_member = guild.get_member(self.bot.user.id) if self.bot.user else None
        if bot_member is None or not bot_member.guild_permissions.manage_roles:
            await interaction.response.send_message(
                "I do not have permission to manage roles. Please update my permissions.",
                ephemeral=True,
            )
            return

        # Check if the user actually has a trial
        if str(user.id) not in self.active_trials:
            await interaction.response.send_message(
                f"{user.display_name} does not have an active trial.",
                ephemeral=True,
            )
            return

        trial_info = self.active_trials[str(user.id)]
        role = guild.get_role(trial_info["role_id"])
        if role is None:
            await interaction.response.send_message(
                "Trial role not found. Please check the trial data.",
                ephemeral=True,
            )
            return

        # Attempt to remove the role and DM the user
        try:
            await user.remove_roles(role, reason="Trial ended manually")
            embed = discord.Embed(
                description=(
                    "## Jouw proefperiode is handmatig geëindigd door een Discord Administrator!\n\n"
                    "-# Dit bericht is automatisch verstuurd door een bot en reacties op deze DM kunnen niet worden gelezen."
                ),
                color=discord.Color(int("dc143c", 16)),
            )
            try:
                await user.send(embed=embed)
            except discord.Forbidden:
                pass
        except discord.Forbidden:
            await interaction.response.send_message(
                "I do not have permission to remove roles from this user.",
                ephemeral=True,
            )
            return
        except Exception as exc:
            await interaction.response.send_message(
                f"Failed to remove role: {exc}",
                ephemeral=True,
            )
            return

        # Remove from active trials and persist
        del self.active_trials[str(user.id)]
        self._save_trials()

        await interaction.response.send_message(
            f"Proefperiode beëindigd voor {user.mention}.",
            suppress_embeds=True,
        )

    async def _send_trial_list(self, interaction: discord.Interaction) -> None:
        """Helper to send a list of active trials and their remaining time."""
        guild = interaction.guild
        if guild is None:
            await interaction.response.send_message(
                "This command can only be used in a guild.",
                ephemeral=True,
            )
            return

        if not self.active_trials:
            await interaction.response.send_message(
                "Er zijn momenteel geen actieve trials.",
                ephemeral=True,
            )
            return

        lines: list[str] = []
        now = datetime.now(timezone.utc)
        for user_id, trial_info in self.active_trials.items():
            member = guild.get_member(int(user_id))
            if member is None:
                # Member left the server or cannot be found; skip
                continue
            end_time: datetime = trial_info["end"]
            remaining = end_time - now
            if remaining.total_seconds() < 0:
                # Already expired; will be cleaned up by background task
                continue
            days = remaining.days
            hours, rem = divmod(remaining.seconds, 3600)
            minutes = rem // 60
            nickname = member.nick if member.nick else member.display_name
            lines.append(f"@{nickname}: {days} dagen {hours} uur en {minutes} minuten")

        if not lines:
            await interaction.response.send_message(
                "Er zijn momenteel geen actieve trials.",
                ephemeral=True,
            )
            return

        await interaction.response.send_message("\n".join(lines), suppress_embeds=True)

    @app_commands.command(name="triallist", description="Toon alle actieve trials met resterende tijd")
    @app_commands.guilds(_GUILD)
    async def triallist(self, interaction: discord.Interaction) -> None:
        """Public slash command that lists all active trials and remaining time."""
        await self._send_trial_list(interaction)

    @app_commands.command(name="tlist", description="Alias voor /triallist")
    @app_commands.guilds(_GUILD)
    async def tlist(self, interaction: discord.Interaction) -> None:
        """Alias for ``/triallist``; forwards to the same implementation."""
        await self._send_trial_list(interaction)

    # ------------------------------------------------------------------
    # Background task
    # ------------------------------------------------------------------
    @tasks.loop(minutes=30)
    async def check_trials(self) -> None:
        """Periodically check for expired trials and remove roles accordingly."""
        # Acquire the guild object; if None (e.g. bot not yet connected), do nothing
        guild = self.bot.get_guild(self.guild_id) if self.guild_id else None
        if guild is None:
            return

        channel = guild.get_channel(self.channel_id) if self.channel_id else None
        now = datetime.now(timezone.utc)
        to_remove: list[str] = []

        for user_id, trial_info in list(self.active_trials.items()):
            if now >= trial_info["end"]:
                member = guild.get_member(int(user_id))
                role = guild.get_role(trial_info["role_id"])
                if member is not None and role is not None and role in member.roles:
                    try:
                        await member.remove_roles(role, reason="Trial period ended")
                        embed = discord.Embed(
                            description=(
                                "# Jouw 7 dagen proefperiode is geëindigd!\n\n"
                                "- We hopen dat je genoten hebt van de exclusieve kanalen en functies tijdens je proefperiode.\n"
                                "- Overweeg lid te worden van onze community om blijvende toegang te krijgen tot alle voordelen.\n\n"
                                "-# Dit bericht is automatisch verstuurd door een bot en reacties op deze DM kunnen niet worden gelezen."
                            ),
                            color=discord.Color(int("D9AF5C", 16)),
                        )
                        try:
                            await member.send(embed=embed)
                        except discord.Forbidden:
                            pass
                        # Optionally announce in a specific channel
                        if channel is not None:
                            await channel.send(f"Proefperiode automatisch beëindigd voor {member.display_name}.")
                    except discord.Forbidden:
                        # Cannot modify roles; skip silently
                        pass
                to_remove.append(user_id)

        # Clean up expired trials and persist
        for user_id in to_remove:
            self.active_trials.pop(user_id, None)
        if to_remove:
            self._save_trials()

    @check_trials.before_loop
    async def before_check_trials(self) -> None:
        """Ensure the bot is ready before starting the background task."""
        await self.bot.wait_until_ready()


async def setup(bot: commands.Bot) -> None:
    """Entry point for loading this cog. Called by ``bot.load_extension``."""
    await bot.add_cog(Trials(bot))
    print("Trials cog loaded")