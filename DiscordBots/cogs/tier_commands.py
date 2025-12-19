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
* ``ONE_PERCENT_ROLE_ID`` – the role assigned to one percent members (default: 1403387097779408956).
* ``PAID_TIER_3_ROLE_ID`` – role assigned to paying customers (default: 1429883911839809599).
* ``MANAGER_ROLE_ID`` – role allowed to invoke paid commands
* ``TRIAL_CHANNEL_ID`` – channel for notifications; used for both trials and paid lists.
* ``BOT_MESSAGES_CHANNEL_ID`` – optional override for paid notifications; if unset, falls back to hardcoded default.
"""

from __future__ import annotations

import os
import json
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
TIERS_CONFIG_PATH = os.path.abspath(os.path.join(BASE_DIR, "..", "tiers.json"))

with open(TIERS_CONFIG_PATH, "r", encoding="utf-8") as f:
    TIERS_CONFIG = json.load(f)
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

# --- Centrale tier-orde en mapping ---
TIER_ORDER = ["instap", "basis", "groei", "elite"]

TIER_ROLE_ENV_MAP = {
    "instap": "INSTAP_ROLE_ID",
    "basis": "BASIS_ROLE_ID",
    "groei": "GROEI_ROLE_ID",
    "elite": "ELITE_ROLE_ID",
}


class TierMembershipManager(commands.Cog):
    """Cog providing commands to manage all membership tiers."""
    def build_membership_embed(
        self,
        tier_key: str,
        mode: str = "membership"
    ) -> discord.Embed:
        """
        Build a start (membership) or trial DM embed based on tiers.json configuration.

        mode:
          - "start": normal membership start
          - "upgrade": upgrade message (same content, different title)
          - "downgrade": downgrade message (same content, different title)
          - "trial": trial start message
          - "terminated": trial manually ended
          - "expired": trial automatically expired
          - "end": membership ended
        """
        tier = TIERS_CONFIG["tiers"][tier_key]
        # Read trial duration from JSON config
        trials_cfg = TIERS_CONFIG.get("trials", {})
        trial_days_real = trials_cfg.get("default_duration_days")
        trial_days_text = trials_cfg.get("text_duration_days", trial_days_real)

        # Select correct template based on mode
        MODE_TEMPLATE_MAP = {
            "start": tier.get("template"),
            "upgrade": tier.get("template"),
            "downgrade": tier.get("template"),
            "trial": tier.get("trial_template", "trial_start"),
            "terminated": "trial_terminated",
            "expired": "trial_expired",
            "end": tier.get("end_template", "membership_end"),
        }

        template_key = MODE_TEMPLATE_MAP.get(mode)

        if mode in ("terminated", "expired") and template_key not in ("trial_terminated", "trial_expired"):
            raise ValueError("Trial termination/expiry must use trial-specific templates.")

        if not template_key:
            raise ValueError(f"Unsupported DM mode: {mode}")

        # Guard: template must exist
        if template_key not in TIERS_CONFIG["dm_templates"]:
            raise KeyError(
                f"DM template '{template_key}' not found in dm_templates. "
                f"Available templates: {list(TIERS_CONFIG['dm_templates'].keys())}"
            )

        template = TIERS_CONFIG["dm_templates"][template_key]
        channels = TIERS_CONFIG["channels"]

        indent = "\u00A0" * 4
        tier_name = tier["display_name"]

        # --- Begin dynamic DM title injection ---
        dm_templates = TIERS_CONFIG.get("dm_templates", {})
        titles_cfg = dm_templates.get("titles", {})
        if mode not in titles_cfg:
            raise KeyError(
                f"No title configured for mode '{mode}'. "
                f"Available modes: {list(titles_cfg.keys())}"
            )

        title_template = titles_cfg[mode]

        dm_title = (
            title_template
            .replace("{{tier_name}}", tier_name)
            .replace("{{trial_days}}", str(trial_days_text) if trial_days_text is not None else "")
        )
        # --- End dynamic DM title injection ---

        lines: list[str] = []

        def replace_vars(text: str) -> str:
            return (
                text
                .replace("{{dm_title}}", dm_title)
                .replace("{{tier_name}}", tier_name)
                .replace("{{trial_days}}", str(trial_days_text) if trial_days_text is not None else "")
            )

        for block in template["content"]:
            if block["type"] == "text":
                for line in block["lines"]:
                    lines.append(replace_vars(line))

            elif block["type"] == "channels":
                section = block["section"]
                if section in tier.get("sections", {}):
                    for ch_key in tier["sections"][section]:
                        lines.append(f"{indent}- {channels[ch_key]}")

            elif block["type"] == "conditional":
                condition = block["condition"]
                if condition in tier.get("sections", {}):
                    for inner in block["content"]:
                        if inner["type"] == "text":
                            for line in inner["lines"]:
                                lines.append(replace_vars(line))
                        elif inner["type"] == "channels":
                            for ch_key in tier["sections"][condition]:
                                lines.append(f"{indent}- {channels[ch_key]}")

        lines.extend(TIERS_CONFIG["dm_footer"])

        return discord.Embed(
            description="\n".join(lines),
            color=discord.Color(int(tier["color"], 16))
        )

    def __init__(self, bot: commands.Bot) -> None:
        self.bot = bot
        load_dotenv()

        # Read guild ID from environment; default to zero (no guild) if unset or invalid.
        try:
            self.guild_id: int = int(os.getenv("DISCORD_GUILD_ID"))
        except (TypeError, ValueError):
            self.guild_id = 0

        # Channel for notifications; use BOT_MESSAGES_CHANNEL_ID if provided, else fall back to
        # a hardcoded default.
        channel_env = os.getenv("BOT_MESSAGES_CHANNEL_ID")
        if channel_env:
            try:
                self.channel_id: int = int(channel_env)
            except ValueError:
                self.channel_id = 1410397459326439455
        else:
            self.channel_id = 1410397459326439455

        # Role ID for paid members; default provided by the user.
        paid_tier_3_role_env = os.getenv("PAID_TIER_3_ROLE_ID")
        try:
            self.paid_tier_3_role_id: int = int(paid_tier_3_role_env) if paid_tier_3_role_env else 1429883911839809599
        except ValueError:
            self.paid_tier_3_role_id = 1429883911839809599

        # Manager role allowed to run paid commands; fall back to TRIAL_MANAGER_ROLE_ID
        # if specified, else the default used in trials.
        manager_env = os.getenv("MANAGER_ROLE_ID")
        try:
            self.manager_role_id: int = int(manager_env) if manager_env else 1377620953135190127
        except ValueError:
            self.manager_role_id = 1377620953135190127

        one_percent_env = os.getenv("ONE_PERCENT_ROLE_ID")
        try:
            self.one_percent_role_id: int = int(one_percent_env) if one_percent_env else 1403387097779408956
        except ValueError:
            self.one_percent_role_id = 1403387097779408956

        # --- Tier role IDs inladen (centrale mapping) ---
        self.tier_role_ids: dict[str, int] = {}
        for tier, env_key in TIER_ROLE_ENV_MAP.items():
            val = os.getenv(env_key)
            if val:
                try:
                    self.tier_role_ids[tier] = int(val)
                except ValueError:
                    pass

        # Path to JSON file storing active paid members
        base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
        self.paid_file: str = os.path.join(base_dir, "registered_members.json")

        # Dictionary of active paid memberships keyed by user ID as string.
        # This is loaded by the bot on startup and shared across cogs.
        if not hasattr(self.bot, "active_paid"):
            self.bot.active_paid: Dict[str, Dict[str, Any]] = {}
        # Provide a save_paid method for convenience
        from discordbot import save_paid
        self.save_paid = lambda: save_paid(self.bot)

    # ------------------------------------------------------------------
    # Persistence helpers (now handled by shared bot.active_paid and save_paid)
    # ------------------------------------------------------------------

    # ------------------------------------------------------------------
    # Slash command implementations
    # ------------------------------------------------------------------
    def assign_tier(self, guild: discord.Guild, user: discord.Member, tier: str = "3") -> dict:
        """
        Helper to assign the appropriate paid tier role and return info for storage.
        In future, this can be extended to support more tiers.
        """
        # For now, only tier "3" is supported, but this can be expanded.
        if tier == "3":
            role = guild.get_role(self.paid_tier_3_role_id)
            role_name = role.name if role else "Elite"
        else:
            # Placeholder for additional tiers
            role = None
            role_name = f"Tier {tier}"
        return {"role": role, "role_name": role_name, "tier": tier}


    def update_paid_status(
        self,
        member: discord.Member,
        role: discord.Role | None,
        tier: str,
        end: bool = False,
    ):
        """
        Update or create membership state for a user.

        Rules:
        - On start / upgrade / downgrade: set a NEW start datetime and clear end.
        - On end: set end datetime, keep existing start.
        """
        user_id = str(member.id)
        now = datetime.now(timezone.utc)

        entry = self.bot.active_paid.get(user_id)

        if not entry:
            entry = {
                "role_id": role.id if role else None,
                "role_name": role.name if role else tier,
                "tier": tier,
                "username": member.name,
                "start": now,
                "end": None,
            }
        else:
            entry["role_id"] = role.id if role else entry.get("role_id")
            entry["role_name"] = role.name if role else entry.get("role_name")
            entry["tier"] = tier
            entry["username"] = member.name

            if end:
                entry["end"] = now
            else:
                # New active phase → reset lifecycle
                entry["start"] = now
                entry["end"] = None

        self.bot.active_paid[user_id] = entry

        # Persist safely: convert datetimes to ISO strings
        serializable = {}
        for uid, data in self.bot.active_paid.items():
            serializable[uid] = {
                **data,
                "start": data["start"].isoformat() if isinstance(data.get("start"), datetime) else data.get("start"),
                "end": data["end"].isoformat() if isinstance(data.get("end"), datetime) else data.get("end"),
            }

        # Ensure path matches tiers.json location
        base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
        file_path = os.path.join(base_dir, "registered_members.json")

        with open(file_path, "w", encoding="utf-8") as f:
            json.dump(serializable, f, indent=4, ensure_ascii=False)

    # --------------- Helper methods for tiers ---------------
    def get_tier_role(self, guild: discord.Guild, tier_key: str) -> discord.Role | None:
        role_id = self.tier_role_ids.get(tier_key)
        return guild.get_role(role_id) if role_id else None

    def get_current_tier(self, member: discord.Member, guild: discord.Guild) -> str | None:
        for tier in TIER_ORDER:
            role = self.get_tier_role(guild, tier)
            if role and role in member.roles:
                return tier
        return None

    async def clear_all_tiers(self, member: discord.Member, guild: discord.Guild):
        for tier in TIER_ORDER:
            role = self.get_tier_role(guild, tier)
            if role and role in member.roles:
                await member.remove_roles(role, reason="Tier reset")

    async def send_membership_dm(self, member: discord.Member, tier: str, mode: str):
        embed = self.build_membership_embed(tier, mode)
        try:
            await member.send(embed=embed)
        except discord.Forbidden:
            pass

    # --------------- Phase 2A: Start-commands ---------------
    @commands.has_role(lambda self: self.manager_role_id)
    @app_commands.command(name="trial", description="Start trial voor Basis")
    @app_commands.guilds(_GUILD)
    async def trial(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        current_tier = self.get_current_tier(user, guild)
        if current_tier:
            await interaction.followup.send(
                f"{user.display_name} is already marked as a {current_tier} member.",
                ephemeral=True,
            )
            return
        await self.clear_all_tiers(user, guild)
        role = self.get_tier_role(guild, "basis")
        if role:
            await user.add_roles(role, reason="Trial start")
        await self.send_membership_dm(user, "basis", "trial")
        await interaction.followup.send("Trial gestart.", ephemeral=True)

    @app_commands.command(name="instap", description="Start Instap lidmaatschap")
    @app_commands.guilds(_GUILD)
    async def instap(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        current_tier = self.get_current_tier(user, guild)
        if current_tier:
            await interaction.followup.send(
                f"{user.display_name} is already marked as a {current_tier} member.",
                ephemeral=True,
            )
            return
        await self.clear_all_tiers(user, guild)
        role = self.get_tier_role(guild, "instap")
        if role:
            await user.add_roles(role, reason="Instap start")
        self.update_paid_status(user, role, tier="instap")
        await self.send_membership_dm(user, "instap", "start")
        await interaction.followup.send("Instap gestart.", ephemeral=True)

    @app_commands.command(name="basis", description="Start Basis lidmaatschap")
    @app_commands.guilds(_GUILD)
    async def basis(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        current_tier = self.get_current_tier(user, guild)
        if current_tier:
            await interaction.followup.send(
                f"{user.display_name} is already marked as a {current_tier} member.",
                ephemeral=True,
            )
            return
        await self.clear_all_tiers(user, guild)
        role = self.get_tier_role(guild, "basis")
        if role:
            await user.add_roles(role, reason="Basis start")
        self.update_paid_status(user, role, tier="basis")
        await self.send_membership_dm(user, "basis", "start")
        await interaction.followup.send("Basis gestart.", ephemeral=True)

    @app_commands.command(name="groei", description="Start Groei lidmaatschap")
    @app_commands.guilds(_GUILD)
    async def groei(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        current_tier = self.get_current_tier(user, guild)
        if current_tier:
            await interaction.followup.send(
                f"{user.display_name} is already marked as a {current_tier} member.",
                ephemeral=True,
            )
            return
        await self.clear_all_tiers(user, guild)
        role = self.get_tier_role(guild, "groei")
        if role:
            await user.add_roles(role, reason="Groei start")
        self.update_paid_status(user, role, tier="groei")
        one_percent = guild.get_role(self.one_percent_role_id)
        if one_percent:
            await user.add_roles(one_percent)
        await self.send_membership_dm(user, "groei", "start")
        await interaction.followup.send("Groei gestart.", ephemeral=True)

    @app_commands.command(name="elite", description="Start Elite lidmaatschap")
    @app_commands.guilds(_GUILD)
    async def elite(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        current_tier = self.get_current_tier(user, guild)
        if current_tier:
            await interaction.followup.send(
                f"{user.display_name} is already marked as a {current_tier} member.",
                ephemeral=True,
            )
            return
        await self.clear_all_tiers(user, guild)
        role = self.get_tier_role(guild, "elite")
        if role:
            await user.add_roles(role, reason="Elite start")
        self.update_paid_status(user, role, tier="elite")
        one_percent = guild.get_role(self.one_percent_role_id)
        if one_percent:
            await user.add_roles(one_percent)
        await self.send_membership_dm(user, "elite", "start")
        await interaction.followup.send("Elite gestart.", ephemeral=True)


    def compare_tiers(self, from_tier: str, to_tier: str) -> int:
        """
        Compare two tiers based on TIER_ORDER.
        Returns:
          -1 if to_tier is lower than from_tier (downgrade)
           0 if equal
           1 if to_tier is higher than from_tier (upgrade)
        """
        return (TIER_ORDER.index(to_tier) > TIER_ORDER.index(from_tier)) - (
            TIER_ORDER.index(to_tier) < TIER_ORDER.index(from_tier)
        )

    # --------------- Phase 2B: Upgrade / Downgrade commands ---------------
    @app_commands.command(name="upgrade", description="Upgrade een lid naar een hoger tier")
    @app_commands.guilds(_GUILD)
    async def upgrade(self, interaction: discord.Interaction, user: discord.Member, tier: str | None = None):
        guild = interaction.guild
        await interaction.response.defer(ephemeral=True)
        current_tier = self.get_current_tier(user, guild)

        if not current_tier:
            await interaction.followup.send(
                f"{user.display_name} heeft nog geen actief lidmaatschap.",
                ephemeral=True,
            )
            return

        if tier is None:
            current_index = TIER_ORDER.index(current_tier)
            if current_index >= len(TIER_ORDER) - 1:
                await interaction.followup.send(
                    f"{user.display_name} kan niet verder geüpgraded worden.",
                    ephemeral=True,
                )
                return
            tier = TIER_ORDER[current_index + 1]

        if tier not in TIER_ORDER:
            await interaction.followup.send(
                f"'{tier}' is geen geldig tier.",
                ephemeral=True,
            )
            return

        if self.compare_tiers(current_tier, tier) != 1:
            await interaction.followup.send(
                f"Upgrade niet mogelijk van {current_tier} naar {tier}.",
                ephemeral=True,
            )
            return

        await self.clear_all_tiers(user, guild)

        role = self.get_tier_role(guild, tier)
        if role:
            await user.add_roles(role, reason="Tier upgrade")
        self.update_paid_status(user, role, tier=tier)

        if tier in ("groei", "elite"):
            one_percent = guild.get_role(self.one_percent_role_id)
            if one_percent:
                await user.add_roles(one_percent)

        await self.send_membership_dm(user, tier, "upgrade")
        await interaction.followup.send(
            f"{user.display_name} is geüpgraded van {current_tier} naar {tier}.",
            ephemeral=True,
        )

    @app_commands.command(name="downgrade", description="Downgrade een lid naar een lager tier")
    @app_commands.guilds(_GUILD)
    async def downgrade(self, interaction: discord.Interaction, user: discord.Member, tier: str | None = None):
        guild = interaction.guild
        await interaction.response.defer(ephemeral=True)
        current_tier = self.get_current_tier(user, guild)

        if not current_tier:
            await interaction.followup.send(
                f"{user.display_name} heeft nog geen actief lidmaatschap.",
                ephemeral=True,
            )
            return

        if tier is None:
            current_index = TIER_ORDER.index(current_tier)
            if current_index <= 0:
                await interaction.followup.send(
                    f"{user.display_name} kan niet verder gedowngraded worden.",
                    ephemeral=True,
                )
                return
            tier = TIER_ORDER[current_index - 1]

        if tier not in TIER_ORDER:
            await interaction.followup.send(
                f"'{tier}' is geen geldig tier.",
                ephemeral=True,
            )
            return

        if self.compare_tiers(current_tier, tier) != -1:
            await interaction.followup.send(
                f"Downgrade niet mogelijk van {current_tier} naar {tier}.",
                ephemeral=True,
            )
            return

        await self.clear_all_tiers(user, guild)

        role = self.get_tier_role(guild, tier)
        if role:
            await user.add_roles(role, reason="Tier downgrade")
        self.update_paid_status(user, role, tier=tier)

        if tier in ("groei", "elite"):
            one_percent = guild.get_role(self.one_percent_role_id)
            if one_percent:
                await user.add_roles(one_percent)

        await self.send_membership_dm(user, tier, "downgrade")
        await interaction.followup.send(
            f"{user.display_name} is gedowngraded van {current_tier} naar {tier}.",
            ephemeral=True,
        )

    # --------------- Phase 2A: End-commands ---------------
    @app_commands.command(name="endtrial", description="Beëindig trial")
    @app_commands.guilds(_GUILD)
    async def endtrial(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        role = self.get_tier_role(guild, "basis")
        if role:
            await user.remove_roles(role, reason="Trial beëindigd")
        await self.send_membership_dm(user, "basis", "terminated")
        await interaction.followup.send("Trial beëindigd.", ephemeral=True)

    @app_commands.command(name="endinstap", description="Beëindig Instap")
    @app_commands.guilds(_GUILD)
    async def endinstap(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        role = self.get_tier_role(guild, "instap")
        if role:
            await user.remove_roles(role)
        self.update_paid_status(user, role, tier="instap", end=True)
        await self.send_membership_dm(user, "instap", "end")
        await interaction.followup.send("Instap beëindigd.", ephemeral=True)

    @app_commands.command(name="endbasis", description="Beëindig Basis")
    @app_commands.guilds(_GUILD)
    async def endbasis(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        role = self.get_tier_role(guild, "basis")
        if role:
            await user.remove_roles(role)
        self.update_paid_status(user, role, tier="basis", end=True)
        await self.send_membership_dm(user, "basis", "end")
        await interaction.followup.send("Basis beëindigd.", ephemeral=True)

    @app_commands.command(name="endgroei", description="Beëindig Groei")
    @app_commands.guilds(_GUILD)
    async def endgroei(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        role = self.get_tier_role(guild, "groei")
        if role:
            await user.remove_roles(role)
        self.update_paid_status(user, role, tier="groei", end=True)
        await self.send_membership_dm(user, "groei", "end")
        await interaction.followup.send("Groei beëindigd.", ephemeral=True)


    @app_commands.command(name="endelite", description="Beëindig Elite")
    @app_commands.guilds(_GUILD)
    async def endelite(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        role = self.get_tier_role(guild, "elite")
        if role is None or role not in user.roles:
            await interaction.followup.send(
                f"{user.display_name} is not currently marked as an elite member.",
                ephemeral=True,
            )
            return
        await user.remove_roles(role)
        # Update active_paid's 'end' field as a datetime object only (no isoformat, no save_paid here)
        user_id = str(user.id)
        info = self.bot.active_paid.get(user_id)
        if info:
            info["end"] = datetime.now(timezone.utc)
            self.bot.active_paid[user_id] = info
        self.update_paid_status(user, role, tier="elite", end=True)
        one_percent = guild.get_role(self.one_percent_role_id)
        if one_percent:
            await user.remove_roles(one_percent)
        await self.send_membership_dm(user, "elite", "end")
        await interaction.followup.send("Elite beëindigd.", ephemeral=True)

    # --------------- Perk commands: 1% role ---------------
    @app_commands.command(name="onepercent", description="Geef de gebruiker toegang tot de 1% groep")
    @app_commands.guilds(_GUILD)
    async def onepercent(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        one_percent = guild.get_role(self.one_percent_role_id)

        if not one_percent:
            await interaction.followup.send(
                "1% role niet gevonden. Controleer de configuratie.",
                ephemeral=True,
            )
            return

        if one_percent in user.roles:
            await interaction.followup.send(
                f"{user.display_name} is al lid van de 1% groep.",
                ephemeral=True,
            )
            return

        await user.add_roles(one_percent, reason="1% perk toegekend")
        await interaction.followup.send(
            f"{user.display_name} heeft nu toegang tot de 1% groep.",
            ephemeral=True,
        )

    @app_commands.command(name="endonepercent", description="Verwijder toegang tot de 1% groep")
    @app_commands.guilds(_GUILD)
    async def endonepercent(self, interaction: discord.Interaction, user: discord.Member):
        await interaction.response.defer(ephemeral=True)
        guild = interaction.guild
        one_percent = guild.get_role(self.one_percent_role_id)

        if not one_percent:
            await interaction.followup.send(
                "1% role niet gevonden. Controleer de configuratie.",
                ephemeral=True,
            )
            return

        if one_percent not in user.roles:
            await interaction.followup.send(
                f"{user.display_name} is geen lid van de 1% groep.",
                ephemeral=True,
            )
            return

        await user.remove_roles(one_percent, reason="1% perk verwijderd")
        await interaction.followup.send(
            f"{user.display_name} heeft geen toegang meer tot de 1% groep.",
            ephemeral=True,
        )

async def setup(bot: commands.Bot) -> None:
    """Load the TierMembershipManager cog."""
    await bot.add_cog(TierMembershipManager(bot))
    print("TierMembershipManager cog loaded")