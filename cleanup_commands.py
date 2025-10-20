"""
cleanup_commands.py
====================

This standalone script removes all registered application (slash) commands for
your bot. It mirrors the behaviour of the original Node.js script provided by
the user, which cleared both global and guild‑specific slash commands via the
Discord API. In this Python version we leverage the `discord.py` library to
access your bot’s guilds and command tree, clearing commands from each before
shutting down.

Usage:
  1. Ensure your bot’s token (and optionally client ID) are available as
     environment variables named ``TOKEN`` and ``CLIENT_ID`` respectively. The
     client ID is not strictly required for this script to function but is
     included for parity with the original JS version.
  2. Run this script once from the command line to purge all commands:

     ``python3 cleanup_commands.py``

  3. Restart your main bot process afterwards to re‑register the commands you
     actually want.

The script logs each step so you can verify which guilds had their commands
removed. It will also attempt to clear global commands, which may take up to
an hour to fully disappear from Discord’s UI due to caching.
"""

import os
import sys
import discord
from dotenv import load_dotenv
load_dotenv()


def main() -> None:
    """Entry point for the cleanup script.

    This function validates environment variables, creates a lightweight
    ``discord.Client`` and associated ``CommandTree``, then waits for the
    bot to connect. Once connected, it iterates through all guilds the bot
    belongs to, clearing each guild’s registered slash commands. After
    processing guilds, it clears global commands and shuts down.
    """
    token = os.getenv("DISCORD_BOT_TOKEN")
    client_id = os.getenv("CLIENT_ID")

    if not token:
        print("Error: TOKEN must be set in your environment (e.g. in a .env file).", file=sys.stderr)
        sys.exit(1)
    if not client_id:
        # We warn but do not exit if CLIENT_ID is missing; it is unused here.
        print("Warning: CLIENT_ID is not set. Continuing without it.")

    # Use default intents. We only need guild membership information to find
    # which guilds to purge commands from.
    intents = discord.Intents.default()
    client = discord.Client(intents=intents)
    tree = discord.app_commands.CommandTree(client)

    @client.event
    async def on_ready() -> None:
        # When the client is ready, begin the cleanup.
        print(f"Logged in as {client.user}. Starting command cleanup…")
        # ``client.guilds`` is a list of guild objects the bot is currently in.
        guilds = list(client.guilds)
        print(f"Bot is in {len(guilds)} guild(s).")

        # Clear global commands first. This affects commands registered without a
        # specific guild scope. Note that it can take some time for global
        # commands to disappear from the UI due to Discord's caching.
        try:
            print("Clearing global (/) commands…")
            tree.clear_commands(guild=None, type=None)
            await tree.sync(guild=None)
            print("Successfully cleared global commands.")
        except Exception as exc:
            print(f"Failed to clear global commands: {exc}", file=sys.stderr)

        # Iterate through each guild and clear its commands individually. We
        # construct a lightweight guild object using ``discord.Object`` because
        # ``tree.clear_commands`` expects this when the guild is scoped.
        cleared = 0
        for guild in guilds:
            try:
                print(f"   -> Clearing commands for guild: {guild.name} ({guild.id})")
                guild_obj = discord.Object(id=guild.id)
                tree.clear_commands(guild=guild_obj, type=None)
                await tree.sync(guild=guild_obj)
                cleared += 1
            except Exception as exc:
                print(
                    f"   -> Failed to clear commands for guild {guild.name} ({guild.id}): {exc}",
                    file=sys.stderr,
                )

        print(f"\nCleanup complete! Cleared commands for {cleared}/{len(guilds)} guild(s).")
        # Gracefully close the client once cleanup is done.
        await client.close()

    # Start the client; this call is blocking until the client closes.
    client.run(token)


if __name__ == "__main__":
    main()