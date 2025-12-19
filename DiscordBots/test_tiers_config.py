from discord import Embed
from cogs.tier_commands import TierMembershipManager
import discord
from discord.ext import commands

# Fake bot (geen connectie)
import discord
from discord.ext import commands

intents = discord.Intents.none()
bot = commands.Bot(command_prefix="!", intents=intents)

manager = TierMembershipManager(bot)

embed = manager.build_membership_embed(
    tier_key="basis",
    mode="end"   # start | upgrade | downgrade | trial | terminated | expired | end
)

print("✅ Embed description:\n")
print(embed.description)
print("\n🎨 Embed color:", embed.color)