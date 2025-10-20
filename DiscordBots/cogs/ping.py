import discord
from discord.ext import commands
from discord import app_commands
import os
from dotenv import load_dotenv

load_dotenv()

# Determine the guild object for slash command registration. Commands in this cog
# will be registered to the specific guild specified by ``DISCORD_GUILD_ID``. If the
# environment variable is not set or invalid, commands will be global.
try:
    _GUILD_ID: int | None = int(os.getenv("DISCORD_GUILD_ID")) if os.getenv("DISCORD_GUILD_ID") else None
except (TypeError, ValueError):
    _GUILD_ID = None

_GUILD = discord.Object(id=_GUILD_ID) if _GUILD_ID else None

class Ping(commands.Cog):
    def __init__(self, bot: commands.Bot):
        self.bot = bot
        # print("Ping cog initialized")

    @app_commands.command(name="ping", description="Responds with Pong! :P")
    @app_commands.guilds(_GUILD)
    async def ping(self, interaction: discord.Interaction):
        print("Ping command invoked")
        await interaction.response.send_message("Pong! => It's working! :P")

async def setup(bot: commands.Bot):
    await bot.add_cog(Ping(bot))
    print("Ping cog loaded")