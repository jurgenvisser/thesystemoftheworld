import discord
from discord.ext import commands
from discord import app_commands
import os
from dotenv import load_dotenv
from discord.ext import tasks
from datetime import datetime, time

load_dotenv()

# Load role IDs from environment variables
MANAGER_ROLE_ID = int(os.getenv("MANAGER_ROLE_ID"))
THESYSTEMNEXUS_ROLE_ID = int(os.getenv("THESYSTEMNEXUS_ROLE_ID"))
COMMUNITYLEDEN_ROLE_ID = int(os.getenv("COMMUNITYLEDEN_ROLE_ID"))

REMINDERS_CHANNEL_ID = int(os.getenv("BOT_REMINDERS_CHANNEL_ID"))
# REMINDERS_CHANNEL_ID = int(os.getenv("BOT_MESSAGES_CHANNEL_ID"))

# Determine the guild object for slash command registration. Commands in this cog
# will be registered to the specific guild specified by ``DISCORD_GUILD_ID``. If the
# environment variable is not set or invalid, commands will be global.
try:
    _GUILD_ID: int | None = int(os.getenv("DISCORD_GUILD_ID")) if os.getenv("DISCORD_GUILD_ID") else None
except (TypeError, ValueError):
    _GUILD_ID = None

_GUILD = discord.Object(id=_GUILD_ID) if _GUILD_ID else None

class ReminderMessages(commands.Cog):
    def __init__(self, bot: commands.Bot):
        self.bot = bot
        self.reflection_message_id: int | None = None
        self.participants: set[int] = set()
        self.check_done_today: bool = False
        self._sent_times: set[time] = set()
        self._reset_done_today: bool = False
        self.daily_reflection.start()
        self.check_participation.start()

    def cog_unload(self):
        self.daily_reflection.cancel()
        self.check_participation.cancel()

    @tasks.loop(minutes=1)
    async def daily_reflection(self):
        now = datetime.now()
        current_time = now.time().replace(second=0, microsecond=0)

        if current_time in self._sent_times:
            return

        if current_time == time(19, 11) and not self._reset_done_today:
            self.participants.clear()
            self.reflection_message_id = None
            self.check_done_today = False
            self._sent_times.clear()
            self._reset_done_today = True

        if current_time != time(19, 11):
            self._reset_done_today = False

        channel = self.bot.get_channel(REMINDERS_CHANNEL_ID)
        if channel is None:
            return

        messages = {
            time(18, 50): "⏳ Over **10 minuten** is het **Dagelijks reflectiemoment (19:00)**.\nZorg dat je er online bij bent.",
            time(18, 55): "⏳ Nog **5 minuten** tot het **Dagelijks reflectiemoment**.\nBegin alvast aan jou relfectie.",
            time(19, 00): (
                "# 🕖 Dagelijks reflectiemoment — 19:00\n\n"
                "Neem nu een moment om terug te kijken op je dag.\n\n"
                "➡️ Deel een korte reflectie (minimaal 1–2 zinnen)\n"
                "➡️ Of reageer met een :white_check_mark: op dit bericht om je aanwezigheid te melden\n\n"
                "_**Zichtbaar deelnemen hoort bij The System.**_"
            )
        }

        if current_time == time(18, 55) and time(18, 55) not in self._sent_times:
            self.participants.clear()

        if current_time in messages:
            msg = await channel.send(messages[current_time])
            self._sent_times.add(current_time)
            if current_time == time(19, 00):
                self.reflection_message_id = msg.id

    def _is_excluded_member(self, member: discord.Member) -> bool:
        excluded_role_ids = {MANAGER_ROLE_ID, THESYSTEMNEXUS_ROLE_ID}
        return any(role.id in excluded_role_ids for role in member.roles)

    @tasks.loop(minutes=1)
    async def check_participation(self):
        now = datetime.now()
        if now.time().replace(second=0, microsecond=0) != time(19, 10):
            return

        if self.reflection_message_id is None:
            return
        
        if self.check_done_today:
            return

        channel = self.bot.get_channel(REMINDERS_CHANNEL_ID)
        if channel is None or not isinstance(channel, discord.TextChannel):
            return

        try:
            reflection_message = await channel.fetch_message(self.reflection_message_id)
        except discord.NotFound:
            return

        guild = channel.guild

        missing = []
        for member in guild.members:
            if COMMUNITYLEDEN_ROLE_ID not in [r.id for r in member.roles]:
                continue
            if member.bot:
                continue
            if self._is_excluded_member(member):
                continue
            if member.id not in self.participants:
                missing.append(member.mention)

        if missing:
            await channel.send(
                "**Reflectie-check:** de volgende leden hebben niets gedeeld of gereageerd:\n"
                + ", ".join(missing)
            )
            self.check_done_today = True

    @daily_reflection.before_loop
    async def before_daily_reflection(self):
        await self.bot.wait_until_ready()

    @check_participation.before_loop
    async def before_check_participation(self):
        await self.bot.wait_until_ready()

    @commands.Cog.listener()
    async def on_message(self, message: discord.Message):
        if message.author.bot:
            return
        if not isinstance(message.author, discord.Member):
            return
        if message.channel.id != REMINDERS_CHANNEL_ID:
            return
        self.participants.add(message.author.id)

    @commands.Cog.listener()
    async def on_reaction_add(self, reaction: discord.Reaction, user: discord.User):
        if user.bot:
            return
        if reaction.message.id != self.reflection_message_id:
            return
        if str(reaction.emoji) == "✅" and isinstance(user, discord.Member):
            self.participants.add(user.id)


async def setup(bot: commands.Bot):
    await bot.add_cog(ReminderMessages(bot))
    print("ReminderMessages cog loaded")