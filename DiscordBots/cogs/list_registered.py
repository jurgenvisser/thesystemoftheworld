"""
Cog implementation for listing paid memberships and trials on a Discord server.

This cog provides slash commands ``/plist`` to list all current
paid customers and active trials. It maintains a JSON file (``registered_members.json``) 
for persisting paid membership and trial information. The file is stored
in the project root.

Configuration values such as guild ID, notification channel ID and role IDs
can be provided via environment variables. If not set, the defaults mirror
those used in the trial system:

* ``DISCORD_GUILD_ID`` – the guild in which commands are registered.
* ``PAID_TIER_1_ROLE_ID`` – role assigned to paying customers (default: 1429883911839809599).
* ``MANAGER_ROLE_ID`` – role allowed to invoke paid commands
* ``TRIAL_CHANNEL_ID`` – channel for notifications; used for both trials and paid lists.
* ``BOT_MESSAGES_CHANNEL_ID`` – optional override for paid notifications; if unset, falls back to hardcoded default.
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


class ListRegistered(commands.Cog):
    """Cog providing commands to list paying and trial members."""

    def __init__(self, bot: commands.Bot) -> None:
        self.bot = bot
        load_dotenv()
        try:
            self.guild_id: int = int(os.getenv("DISCORD_GUILD_ID"))
        except (TypeError, ValueError):
            self.guild_id = 0
        channel_env = os.getenv("BOT_MESSAGES_CHANNEL_ID")
        if channel_env:
            try:
                self.channel_id: int = int(channel_env)
            except ValueError:
                self.channel_id = 1410397459326439455
        else:
            self.channel_id = 1410397459326439455
        if not hasattr(self.bot, "active_paid"):
            self.bot.active_paid: Dict[str, Dict[str, Any]] = {}

    @app_commands.command(name="plist", description="List all paid customers and active trials")
    @app_commands.guilds(_GUILD)
    async def plist(self, interaction: discord.Interaction) -> None:
        """Send a message listing all current paid customers sorted by tier and trials at the bottom."""
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
        # Separate paid by tier and trials
        paid_members = {uid: info for uid, info in self.bot.active_paid.items() if info.get("tier") in ("1", "2", "3")}
        trials = {uid: info for uid, info in self.bot.active_paid.items() if info.get("tier") == "trial"}
        if not paid_members and not trials:
            await interaction.response.send_message(
                "Er zijn momenteel geen betaalde klanten of actieve trials.",
                ephemeral=True,
            )
            return
        tier_order = [("3", "Elite"), ("2", "Groei"), ("1", "Basis")]
        users_by_tier = {tier: [] for tier, _ in tier_order}
        for user_id, info in paid_members.items():
            tier = str(info.get("tier", "1"))
            users_by_tier.setdefault(tier, []).append((user_id, info))
        lines = ["# Tierlist", ""]
        for tier, heading in tier_order:
            lines.append(heading)
            tier_users = users_by_tier.get(tier, [])
            if not tier_users:
                if heading == "Elite":
                    lines.append("Geen elite gebruikers")
                elif heading == "Groei":
                    lines.append("Geen groei gebruikers")
                elif heading == "Basis":
                    lines.append("Geen basis gebruikers")
                else:
                    lines.append("Geen gebruikers")
            else:
                sorted_users = sorted(tier_users, key=lambda tup: tup[1].get("username", ""))
                for user_id, info in sorted_users:
                    member = guild.get_member(int(user_id))
                    if member:
                        nickname = member.nick if member.nick else member.display_name
                    else:
                        nickname = info.get("username", user_id)
                    lines.append(f"@{nickname}")
            lines.append("")
        # Trials section
        lines.append("Trials")
        if not trials:
            lines.append("Geen actieve trials")
        else:
            from datetime import datetime, timezone
            now = datetime.now(timezone.utc)
            sorted_trials = sorted(trials.items(), key=lambda tup: tup[1].get("username", ""))
            for user_id, info in sorted_trials:
                member = guild.get_member(int(user_id))
                if member:
                    nickname = member.nick if member.nick else member.display_name
                else:
                    nickname = info.get("username", user_id)
                # Calculate remaining time
                end_time = info["end"]
                remaining = end_time - now
                if remaining.total_seconds() < 0:
                    continue
                days = remaining.days
                hours, rem = divmod(remaining.seconds, 3600)
                minutes = rem // 60
                lines.append(f"@{nickname}: {days} dagen {hours} uur en {minutes} minuten")
        await interaction.response.send_message("\n".join(lines), suppress_embeds=True)

async def setup(bot: commands.Bot) -> None:
    """Load the ListRegistered cog."""
    await bot.add_cog(ListRegistered(bot))
    print("ListRegistered cog loaded")