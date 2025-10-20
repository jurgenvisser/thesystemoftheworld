"""
Cog implementation for managing paid memberships on a Discord server.

This cog provides slash commands ``/paid`` to assign a paid customer role to a
user, ``/endpaid`` to remove the paid role, and ``/plist`` to list all current
paid customers. It maintains a JSON file (``paid.json``) similar in format to
``trials.json`` for persisting paid membership information. The file is stored
in the project root, alongside ``trials.json``.

Configuration values such as guild ID, notification channel ID and role IDs
can be provided via environment variables. If not set, the defaults mirror
those used in the trial system:

* ``DISCORD_GUILD_ID`` – the guild in which commands are registered.
* ``PAID_ROLE_ID`` – role assigned to paying customers (default: 1429883911839809599).
* ``PAID_MANAGER_ROLE_ID`` – role allowed to invoke paid commands (falls back to
  ``TRIAL_MANAGER_ROLE_ID`` if set, or 1377620953135190127).
* ``TRIAL_CHANNEL_ID`` – channel for notifications; used for both trials and paid lists.
* ``PAID_CHANNEL_ID`` – optional override for paid notifications; if unset,
  ``TRIAL_CHANNEL_ID`` or the default is used.
"""

from __future__ import annotations

import os
import json
from datetime import datetime, timezone
from typing import Dict, Any

import discord
from discord import app_commands
from discord.ext import commands
from dotenv import load_dotenv

# Determine the guild object for slash command registration. If ``DISCORD_GUILD_ID`` is
# defined, commands will be registered to that guild only. Otherwise they become
# global commands which may take longer to appear. See the bot's ``on_ready`` handler
# for synchronization details.
try:
    _GUILD_ID: int | None = int(os.getenv("DISCORD_GUILD_ID")) if os.getenv("DISCORD_GUILD_ID") else None
except (TypeError, ValueError):
    _GUILD_ID = None

_GUILD = discord.Object(id=_GUILD_ID) if _GUILD_ID else None


class Paying(commands.Cog):
    """Cog providing commands to manage paid members."""

    def __init__(self, bot: commands.Bot) -> None:
        self.bot = bot
        load_dotenv()

        # Read guild ID from environment; default to zero (no guild) if unset or invalid.
        try:
            self.guild_id: int = int(os.getenv("DISCORD_GUILD_ID"))
        except (TypeError, ValueError):
            self.guild_id = 0

        # Channel for notifications; use PAID_CHANNEL_ID if provided, else fall back to
        # TRIAL_CHANNEL_ID or a hardcoded default.
        channel_env = os.getenv("PAID_CHANNEL_ID") or os.getenv("TRIAL_CHANNEL_ID")
        if channel_env:
            try:
                self.channel_id: int = int(channel_env)
            except ValueError:
                self.channel_id = 1410397459326439455
        else:
            self.channel_id = 1410397459326439455

        # Role ID for paid members; default provided by the user.
        paid_role_env = os.getenv("PAID_ROLE_ID")
        try:
            self.paid_role_id: int = int(paid_role_env) if paid_role_env else 1429883911839809599
        except ValueError:
            self.paid_role_id = 1429883911839809599

        # Manager role allowed to run paid commands; fall back to TRIAL_MANAGER_ROLE_ID
        # if specified, else the default used in trials.
        manager_env = os.getenv("PAID_MANAGER_ROLE_ID") or os.getenv("TRIAL_MANAGER_ROLE_ID")
        try:
            self.manager_role_id: int = int(manager_env) if manager_env else 1377620953135190127
        except ValueError:
            self.manager_role_id = 1377620953135190127

        # Path to JSON file storing active paid members
        base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
        self.paid_file: str = os.path.join(base_dir, "paid.json")

        # Dictionary of active paid memberships keyed by user ID as string. Each entry
        # contains role_id, username, start and end times. End time is not used for
        # paid subscriptions but is kept for structural consistency.
        self.active_paid: Dict[str, Dict[str, Any]] = {}
        self._load_paid()

    # ------------------------------------------------------------------
    # Persistence helpers
    # ------------------------------------------------------------------
    def _load_paid(self) -> None:
        """Load paid membership data from JSON file into memory."""
        if not os.path.exists(self.paid_file):
            self.active_paid = {}
            return
        try:
            with open(self.paid_file, "r", encoding="utf-8") as fp:
                data = json.load(fp)
            for user_id, info in data.items():
                try:
                    start = datetime.fromisoformat(info["start"])
                    # End time is not meaningful for paid members; parse but ignore
                    end = datetime.fromisoformat(info["end"]) if info.get("end") else start
                    self.active_paid[user_id] = {
                        "role_id": info["role_id"],
                        "username": info["username"],
                        "start": start,
                        "end": end,
                    }
                except Exception:
                    continue
        except Exception:
            self.active_paid = {}

    def _save_paid(self) -> None:
        """Persist the current paid membership state to JSON."""
        serialisable: Dict[str, Dict[str, Any]] = {}
        for user_id, info in self.active_paid.items():
            serialisable[user_id] = {
                "role_id": info["role_id"],
                "username": info["username"],
                "start": info["start"].isoformat(),
                # Store end equal to start for structural compatibility
                "end": info["end"].isoformat() if isinstance(info["end"], datetime) else info["start"].isoformat(),
            }
        with open(self.paid_file, "w", encoding="utf-8") as fp:
            json.dump(serialisable, fp, indent=4)

    # ------------------------------------------------------------------
    # Slash command implementations
    # ------------------------------------------------------------------
    @app_commands.command(name="paid", description="Mark a user as a paid customer")
    @app_commands.guilds(_GUILD)
    @app_commands.describe(user="The user to give paid customer status")
    async def paid(self, interaction: discord.Interaction, user: discord.Member) -> None:
        """Assign the paid role to a user and record their membership."""
        guild = interaction.guild
        if guild is None:
            await interaction.response.send_message(
                "This command can only be used in a guild.",
                ephemeral=True,
            )
            return

        # Check invoking user has the manager role
        manager_role = guild.get_role(self.manager_role_id)
        if manager_role is None or manager_role not in interaction.user.roles:
            await interaction.response.send_message(
                "You do not have permission to use this command.",
                ephemeral=True,
            )
            return

        # Ensure the bot can manage roles
        bot_member = guild.get_member(self.bot.user.id) if self.bot.user else None
        if bot_member is None or not bot_member.guild_permissions.manage_roles:
            await interaction.response.send_message(
                "I do not have permission to manage roles. Please update my permissions.",
                ephemeral=True,
            )
            return

        # Resolve the paid role
        role = guild.get_role(self.paid_role_id)
        if role is None:
            await interaction.response.send_message(
                "Paid role not found. Please check the PAID_ROLE_ID.",
                ephemeral=True,
            )
            return

        # If user already has paid membership
        if str(user.id) in self.active_paid:
            await interaction.response.send_message(
                f"{user.display_name} is already marked as a paid customer.",
                ephemeral=True,
            )
            return

        # Assign the role
        try:
            await user.add_roles(role, reason="Granted paid membership")
            # DM the user to thank them
            embed = discord.Embed(
                description=(
                    "# Bedankt voor het worden van een betaalde klant!\n\n"
                    "- Je hebt nu volledige toegang tot onze community en exclusieve functies.\n"
                    "- Als je vragen hebt of ondersteuning nodig hebt, laat het ons dan weten.\n\n"
                    "-# Dit bericht is automatisch verstuurd door een bot en reacties op deze DM kunnen niet worden gelezen."
                ),
                color=discord.Color(int("32CD32", 16)),  # LimeGreen colour as a nice contrast
            )
            try:
                await user.send(embed=embed)
            except discord.Forbidden:
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

        # Record membership
        start_time = datetime.now(timezone.utc)
        # For consistency, set end equal to start; not meaningful for paid
        self.active_paid[str(user.id)] = {
            "role_id": role.id,
            "username": user.name,
            "start": start_time,
            "end": start_time,
        }
        self._save_paid()

        # # Notify channel that a new paid customer has been added
        # channel = guild.get_channel(self.channel_id)
        # if channel is not None:
        #     try:
        #         await channel.send(f"{user.display_name} is now a paid customer!")
        #     except Exception:
        #         pass

        await interaction.response.send_message(
            f"Betaalde klant status toegekend aan {user.mention}.",
            suppress_embeds=True,
        )

    @app_commands.command(name="endpaid", description="Revoke paid customer status from a user")
    @app_commands.guilds(_GUILD)
    @app_commands.describe(user="The user whose paid status should be removed")
    async def endpaid(self, interaction: discord.Interaction, user: discord.Member) -> None:
        """Remove the paid role from a user and delete their membership record."""
        guild = interaction.guild
        if guild is None:
            await interaction.response.send_message(
                "This command can only be used in a guild.",
                ephemeral=True,
            )
            return

        # Check permissions
        manager_role = guild.get_role(self.manager_role_id)
        if manager_role is None or manager_role not in interaction.user.roles:
            await interaction.response.send_message(
                "You do not have permission to use this command.",
                ephemeral=True,
            )
            return

        bot_member = guild.get_member(self.bot.user.id) if self.bot.user else None
        if bot_member is None or not bot_member.guild_permissions.manage_roles:
            await interaction.response.send_message(
                "I do not have permission to manage roles. Please update my permissions.",
                ephemeral=True,
            )
            return

        # Ensure user is currently marked as paid
        if str(user.id) not in self.active_paid:
            await interaction.response.send_message(
                f"{user.display_name} is not currently marked as a paid customer.",
                ephemeral=True,
            )
            return

        info = self.active_paid[str(user.id)]
        role = guild.get_role(info["role_id"])
        if role is None:
            await interaction.response.send_message(
                "Paid role not found. Please check the PAID_ROLE_ID.",
                ephemeral=True,
            )
            return

        # Remove the role and DM the user
        try:
            await user.remove_roles(role, reason="Revoked paid membership")
            embed = discord.Embed(
                description=(
                    "## Je betaalde lidmaatschap is beëindigd.\n\n"
                    "- Je hebt geen toegang meer tot de betaalde functies.\n"
                    "- Als je denkt dat dit een vergissing is, neem dan contact op met een beheerder.\n\n"
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

        # Remove from records
        del self.active_paid[str(user.id)]
        self._save_paid()

        # # Notify channel
        # channel = guild.get_channel(self.channel_id)
        # if channel is not None:
        #     try:
        #         await channel.send(f"{user.display_name} is no longer a paid customer.")
        #     except Exception:
        #         pass

        await interaction.response.send_message(
            f"Betaalde klant status verwijderd voor {user.mention}.",
            suppress_embeds=True,
        )
        
    @app_commands.command(name="plist", description="List all paid customers")
    @app_commands.guilds(_GUILD)
    async def plist(self, interaction: discord.Interaction) -> None:
        """Send a message to the notification channel listing all current paid customers."""
        guild = interaction.guild
        if guild is None:
            await interaction.response.send_message(
                "This command can only be used in a guild.",
                ephemeral=True,
            )
            return

        channel = guild.get_channel(self.channel_id)
        if channel is None:
            await interaction.response.send_message(
                "The notification channel could not be found.",
                ephemeral=True,
            )
            return

        if not self.active_paid:
            await channel.send("Er zijn momenteel geen betaalde klanten.")
            await interaction.response.send_message(
                "Er zijn momenteel geen betaalde klanten.",
                ephemeral=True,
            )
            return

        lines = []
        for user_id, info in self.active_paid.items():
            member = guild.get_member(int(user_id))
            nickname = member.nick if member.nick else member.display_name
            display_name = member.display_name if member else info.get("username", user_id)
            lines.append(f"@{nickname}")

        await interaction.response.send_message("\n".join(lines), suppress_embeds=True)


async def setup(bot: commands.Bot) -> None:
    """Load the Paying cog."""
    await bot.add_cog(Paying(bot))
    print("Paying cog loaded")