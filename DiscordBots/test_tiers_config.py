# test_tiers_config.py

import os

# ⬇️ Forceer een fake guild id zodat decorators niet crashen
os.environ["DISCORD_GUILD_ID"] = "1"

import discord
from discord.ext import commands
from cogs.tier_commands import TierMembershipManager

# Fake bot (geen connectie met Discord)
intents = discord.Intents.none()
bot = commands.Bot(command_prefix="!", intents=intents)

manager = TierMembershipManager(bot)

embed = manager.build_membership_embed(
    tier_key="basis",
    mode="start"   # start | upgrade | downgrade | trial | terminated | expired | end
)

print("✅ Embed description:\n")
print(embed.description)
print("\n🎨 Embed color:", embed.color)