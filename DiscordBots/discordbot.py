"""
Entry point for the Discord bot.

This script instantiates a :class:`discord.ext.commands.Bot`, sets up basic
event handlers and error handling, and loads command cogs from the ``cogs``
package. Commands such as ``/trial``, ``/endtrial`` and ``/tlist`` are now
provided via the ``cogs.trials`` module. Additional cogs (for example
``cogs.ping``) can be loaded in the ``load_cogs`` coroutine below.

To run the bot, ensure a `.env` file exists in the project root with at
least the following environment variables defined:

    DISCORD_BOT_TOKEN=<your bot token>
    DISCORD_GUILD_ID=<guild id to register commands for>

Optional variables such as TRIAL_ROLE_ID, TRIAL_MANAGER_ROLE_ID and
TRIAL_CHANNEL_ID may be specified to override default values used by the
trials cog. These fall back to the constants defined in ``cogs/trials.py``
if not provided.
"""

from __future__ import annotations

import asyncio
import os

import discord
from discord.ext import commands
from dotenv import load_dotenv

import json
import os
from datetime import datetime, timezone

# Load environment variables from .env. This is idempotent and safe to call
# multiple times across modules.
load_dotenv()

# Required configuration: bot token and guild ID where commands will be
# registered. The guild ID restricts slash command registration to a
# specific server for faster updates during development. Remove the guild
# argument in ``bot.tree.sync`` if you wish to register globally instead.
TOKEN = os.getenv("DISCORD_BOT_TOKEN")
try:
    GUILD_ID = int(os.getenv("DISCORD_GUILD_ID")) if os.getenv("DISCORD_GUILD_ID") else None
except ValueError:
    GUILD_ID = None


# Configure the bot with sensible defaults. In addition to the defaults,
# enable ``message_content`` and ``members`` intents to support commands and
# membership queries used by the trials cog.
intents = discord.Intents.default()
intents.message_content = True
intents.members = True
bot = commands.Bot(command_prefix="!", intents=intents)

def load_paid_data(bot):
    """Load registered_members.json and store it on the bot for sharing between cogs."""
    base_dir = os.path.dirname(os.path.abspath(__file__))
    paid_file = os.path.join(base_dir, "registered_members.json")
    bot.active_paid = {}
    if not os.path.exists(paid_file):
        return
    try:
        with open(paid_file, "r", encoding="utf-8") as fp:
            data = json.load(fp)
        for user_id, info in data.items():
            try:
                start = datetime.fromisoformat(info["start"])
                end = datetime.fromisoformat(info["end"]) if info.get("end") else start
                bot.active_paid[user_id] = {
                    "role_id": info["role_id"],
                    "role_name": info.get("role_name", "Basis"),
                    "tier": info.get("tier", "1"),
                    "username": info["username"],
                    "start": start,
                    "end": end,
                }
            except Exception:
                continue
    except Exception as exc:
        print(f"Failed to load registered_members.json: {exc}")

def save_paid(bot):
    """Write bot.active_paid to registered_members.json (shared for all cogs)."""
    base_dir = os.path.dirname(os.path.abspath(__file__))
    paid_file = os.path.join(base_dir, "registered_members.json")
    serializable = {}
    for user_id, info in bot.active_paid.items():
        serializable[user_id] = {
            "role_id": info["role_id"],
            "role_name": info.get("role_name", "Basis"),
            "tier": info.get("tier", "1"),
            "username": info["username"],
            "start": info["start"].isoformat(),
            "end": info["end"].isoformat() if isinstance(info["end"], datetime) else info["start"].isoformat(),
        }
    with open(paid_file, "w", encoding="utf-8") as fp:
        json.dump(serializable, fp, indent=4)

@bot.event
async def on_ready() -> None:
    """Called when the bot has successfully connected to Discord."""
    print(f"Logged in as {bot.user}")
    # Sync application (slash) commands for the configured guild. This makes
    # changes propagate much more quickly during development. Remove the
    # guild argument to sync globally.
    try:
        if GUILD_ID is not None:
            # Register slash commands directly to the specified guild. Commands are decorated with
            # ``app_commands.guilds`` in their respective cogs, so there is no need to copy global
            # commands. Syncing the guild ensures commands show up immediately.
            guild = discord.Object(id=GUILD_ID)
            try:
                synced = await bot.tree.sync(guild=guild)
                print(f"Synced {len(synced)} command(s) to guild {GUILD_ID}")
            except Exception as exc:
                print(f"Failed to sync commands to guild {GUILD_ID}: {exc}")
        else:
            # If no guild ID is specified, sync global commands. This may take up to an hour to
            # propagate across all guilds.
            try:
                synced = await bot.tree.sync()
                print(f"Synced {len(synced)} global command(s)")
            except Exception as exc:
                print(f"Failed to sync global commands: {exc}")
    except Exception as exc:
        print(f"Failed to sync commands: {exc}")


@bot.tree.error
async def on_app_command_error(interaction: discord.Interaction, error: Exception) -> None:
    """Basic error handler for slash commands.

    If an unrecognised command is invoked, a message is printed to the
    console. Other errors are also printed. Errors are not sent back to
    the user directly to avoid leaking sensitive information.
    """
    if isinstance(error, discord.app_commands.errors.CommandNotFound):
        print(f"Unknown command used: {interaction.data.get('name')}")
        return
    print(f"Error: {error}")


async def load_cogs() -> None:
    """Load bot cogs.

    Cogs encapsulate related commands and background tasks. When adding
    additional cogs, append further calls to ``bot.load_extension`` here.
    Because cog ``setup`` functions may be asynchronous, this function must
    also be ``async`` and awaited before starting the bot.
    """
    # Load the ping cog if present
    try:
        await bot.load_extension("cogs.ping")
    except Exception as exc:
        print(f"Failed to load ping cog: {exc}")

    # Load the trials cog which provides /trial, /endtrial, /triallist and /tlist
    try:
        await bot.load_extension("cogs.trials")
    except Exception as exc:
        print(f"Failed to load trials cog: {exc}")

    # Load the AutoMod DM cog for sending direct messages when AutoMod triggers
    try:
        await bot.load_extension("cogs.automod")
    except Exception as exc:
        print(f"Failed to load AutoModDM cog: {exc}")

    # Load the paying_tier_0 cog for managing paid customer memberships
    try:
        await bot.load_extension("cogs.paying_tier_0")
    except Exception as exc:
        print(f"Failed to load PayingTier0 cog: {exc}")
        
    # Load the paying_tier_1 cog for managing paid customer memberships
    try:
        await bot.load_extension("cogs.paying_tier_1")
    except Exception as exc:
        print(f"Failed to load PayingTier1 cog: {exc}")

    # Load the paying_tier_2 cog for managing paid customer memberships
    try:
        await bot.load_extension("cogs.paying_tier_2")
    except Exception as exc:
        print(f"Failed to load PayingTier2 cog: {exc}")

    # Load the paying_tier_3 cog for managing paid customer memberships
    try:
        await bot.load_extension("cogs.paying_tier_3")
    except Exception as exc:
        print(f"Failed to load PayingTier3 cog: {exc}")

    # Load the list_paying cog for listing paid customers
    try:
        await bot.load_extension("cogs.list_registered")
    except Exception as exc:
        print(f"Failed to load ListPaying cog: {exc}")
    
    # Load the server cog if present
    try:
        await bot.load_extension("cogs.server")
    except Exception as exc:
        print(f"Failed to load server cog: {exc}")

    # Load the cognitive_reset cog if present
    try:
        await bot.load_extension("cogs.cognitive_reset")
    except Exception as exc:
        print(f"Failed to load cognitive-reset cog: {exc}")

    # Load the reminder_messages cog if present
    try:
        await bot.load_extension("cogs.reminder_messages")
    except Exception as exc:
        print(f"Failed to load reminder_messages cog: {exc}")


async def main() -> None:
    """Main entry point for running the bot."""
    if not TOKEN:
        print("DISCORD_BOT_TOKEN is not set. Bot cannot start.")
        return
    async with bot:
        # Load cogs before starting the bot. Slash commands defined in cogs
        # are registered at this point.
        load_paid_data(bot)
        await load_cogs()
        # Start the bot. This call blocks until the bot is shut down.
        await bot.start(TOKEN)


if __name__ == "__main__":
    # --- Run the Discord Bot ---
    try:
        asyncio.run(main())
    except KeyboardInterrupt:
        print("Bot shutting down.")