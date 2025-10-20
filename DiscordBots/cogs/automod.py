"""
Cog providing AutoMod DM notifications and staff logging.

This cog listens for messages in a designated AutoMod channel. When a message
indicates that a user has triggered a moderation keyword, the cog privately
informs the offending user via DM and optionally logs the incident to a staff
channel. The original ``DM_bot.py`` script has been refactored into this
class to integrate cleanly with the main bot using ``commands.Cog``.

Configuration values can be provided via environment variables (see below) or
will fall back to the hard‑coded defaults used previously:

* ``AUTOMOD_CHANNEL_ID`` – ID of the channel where AutoMod posts reports.
* ``STAFF_LOG_CHANNEL_ID`` – ID of the channel where incidents should be logged.
* ``DISCORD_BOT_TOKEN`` and ``DISCORD_GUILD_ID`` are read by ``discordbot.py``.
"""

from __future__ import annotations

import os
import re
from typing import Optional

import discord
from discord.ext import commands
from dotenv import load_dotenv


class AutoModDM(commands.Cog):
    """Cog to DM users when AutoMod flags their message and log to staff."""

    def __init__(self, bot: commands.Bot) -> None:
        self.bot = bot
        # Load .env file if present. This is safe to call multiple times across cogs.
        load_dotenv()

        # Channel IDs for AutoMod reports and staff logs. If environment variables
        # are unset or invalid, use the fallback values from the original script.
        automod_env = os.getenv("AUTOMOD_CHANNEL_ID")
        staff_env = os.getenv("STAFF_LOG_CHANNEL_ID")
        try:
            self.automod_channel_id: int = int(automod_env) if automod_env else 1390455376956231721
        except ValueError:
            self.automod_channel_id = 1390455376956231721
        try:
            self.staff_log_channel_id: int = int(staff_env) if staff_env else 1390455376956231721
        except ValueError:
            self.staff_log_channel_id = 1390455376956231721

    @commands.Cog.listener()
    async def on_message(self, message: discord.Message) -> None:
        """Handle incoming messages for AutoMod notifications and logging."""
        # Ignore messages sent by this bot
        if message.author == self.bot.user:
            return

        # Only process messages in the AutoMod channel
        if message.channel.id != self.automod_channel_id:
            return

        keyword: Optional[str] = None
        rule: Optional[str] = None
        highlighted_keyword_content: Optional[str] = None

        # Check the plain message content for key/value lines (case insensitive)
        for line in message.content.splitlines():
            lower = line.lower().strip()
            if lower.startswith("keyword:"):
                keyword = line[len("keyword:"):].strip()
            elif lower.startswith("rule:"):
                rule = line[len("rule:"):].strip()

        # Examine embed fields for keyword and matching content
        for embed in message.embeds:
            for field in embed.fields:
                name_lower = field.name.lower()
                value = field.value
                if name_lower == "keyword_matched_content":
                    highlighted_keyword_content = value
                elif name_lower == "keyword":
                    keyword = value
                elif name_lower == "rule_name":
                    rule = value

        # If either keyword or rule is missing, nothing to do
        if not keyword or not rule:
            return

        # Extract the matched keyword in context from the highlighted content
        voor_de_text = ""
        achter_de_text = ""
        highlighted_content = highlighted_keyword_content or keyword
        if highlighted_keyword_content and keyword:
            # Remove wildcard characters and escape for regex
            clean_keyword = re.escape(keyword.replace("*", "").strip())
            match = re.search(f"(.*)({clean_keyword})(.*)", highlighted_keyword_content, re.IGNORECASE)
            if match:
                voor_de_text = match.group(1)
                highlighted_content = match.group(2)
                achter_de_text = match.group(3)

        # Attempt to DM the offending user with a formatted message
        try:
            embed = discord.Embed(
                description=(
                    f"# Praat met <@1282862220631478454> als je nu hulp nodig hebt!\n\n"
                    f"## Hallo {message.author.name},\n"
                    f"Je bericht bevat een geblokkeerd woord of uitdrukking: {voor_de_text}**{highlighted_content}**{achter_de_text}\n"
                    "-# Let op dikgedrukte tekst.\n\n"
                    "Gelieve hier rekening mee te houden om verdere waarschuwingen te voorkomen.\n\n"
                    "Heb je het gevoel dat deze melding onterecht is, neem dan contact op met <@1377701835053334696> via een DM.\n\n"
                    "Groet, The System Nexus\n"
                    "-# Ik ben een bot en reacties op deze DM kunnen niet worden gelezen."
                ),
                color=discord.Color.red(),
            )
            await message.author.send(embed=embed)
        except discord.Forbidden:
            # User may have DMs disabled; log but do not raise
            print(f"Kan geen DM sturen naar {message.author}, mogelijk hebben ze DMs uitstaan.")
        except Exception as exc:
            print(f"Failed to DM user {message.author}: {exc}")

        # Log the incident to the staff channel if available
        staff_channel = self.bot.get_channel(self.staff_log_channel_id)
        if staff_channel is not None:
            log_message = (
                f"In de text: {voor_de_text}**{highlighted_content}**{achter_de_text}\n"
                f"-# Let op dikgedrukte tekst."
            )
            try:
                await staff_channel.send(log_message)
            except Exception:
                # Suppress errors to avoid spamming console
                pass


async def setup(bot: commands.Bot) -> None:
    """Load the AutoModDM cog."""
    await bot.add_cog(AutoModDM(bot))
    print("AutoModDM cog loaded")