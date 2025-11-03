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
* ``PAID_TIER_3_ROLE_ID`` – role assigned to paying customers (default: 1429883911839809599).
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


class PayingTier3(commands.Cog):
    """Cog providing commands to manage paid tier 2 members."""

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

    @app_commands.command(name="elite", description="Mark a user as a tier 2 customer")
    @app_commands.guilds(_GUILD)
    @app_commands.describe(user="The user to give tier 2 customer status")
    async def elite(self, interaction: discord.Interaction, user: discord.Member) -> None:
        """Assign the tier 2 role to a user and record their membership."""
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

        # Assign tier and role
        tier = "1"
        tier_info = self.assign_tier(guild, user, tier)
        role = tier_info["role"]
        role_name = tier_info["role_name"]
        if role is None:
            await interaction.response.send_message(
                f"Tier {tier} role not found. Please check the configuration.",
                ephemeral=True,
            )
            return

        # If user already has paid membership
        if str(user.id) in self.bot.active_paid:
            await interaction.response.send_message(
                f"{user.display_name} is already marked as a tier {tier} customer.",
                ephemeral=True,
            )
            return

        # Assign the role
        try:
            await user.add_roles(role, reason=f"Granted tier {tier} membership")
            # DM the user to thank them
            indent = "\u00A0" * 4  # non-breaking spaces (echte spaties die blijven staan)
            embed = discord.Embed(
                description=(
                    "# Je bent nu lid van The System Elite!\n\n"

                    "The System Elite geeft je de volgende voordelen:\n"
                    "- Toegang tot informatieve en motiverende kanalen zoals:\n"
                    f"{indent}- <#1382001389907087390>\n" #dagtips
                    f"{indent}- <#1382009838036455516>\n" #dagqouto
                    "- Deelname aan de kanalen:\n"
                    f"{indent}- <#1397302060139020309>\n" #dagcheck
                    f"{indent}- <#1390407711757303808>\n" #uitdaging-van-de-week
                    "- Je maakt standaard deel uit van de 1% groep en krijg toegang tot de kanalen:\n"
                    f"{indent}- <#1403390531492642947>\n" #wekelijks-groepsgesprek
                    f"{indent}- <#1403391139226058883>\n" #Groepsgesprek
                    f"{indent}- <#1403398238144430101>\n" #Off Topic
                    "- Je krijgt toegang tot exclusieve Elite kanalen zoals:\n"
                    f"{indent}- <#1389335090080907394>\n" #de-kern
                    f"{indent}- <#1390685336190845009>\n" #Voice Kanaal
                    "- 4 afspraken met <@1282862220631478454> per week om je voortgang te bespreken en doelen te stellen.\n"
                    "- 24/7 Telefonische spoedondersteuning.\n\n"

                    "Geniet van The System Elite en ontdek wat onze community te bieden heeft.\n"
                    "Als je vragen hebt of ondersteuning nodig hebt, laat het ons dan weten.\n\n"

                    "-# Dit bericht is automatisch verstuurd door een bot en reacties op deze DM kunnen niet worden gelezen."
                ),
                color=discord.Color(int("D9AF5C", 16)),
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
        self.bot.active_paid[str(user.id)] = {
            "role_id": role.id,
            "role_name": role_name,
            "tier": tier,
            "username": user.name,
            "start": start_time,
            "end": start_time,
        }
        self.save_paid()

        await interaction.response.send_message(
            f"The System Elite status toegekend aan {user.mention}.",
            suppress_embeds=True,
        )

    @app_commands.command(name="endelite", description="Revoke tier 2 customer status from a user")
    @app_commands.guilds(_GUILD)
    @app_commands.describe(user="The user whose tier 2 status should be removed")
    async def endelite(self, interaction: discord.Interaction, user: discord.Member) -> None:
        """Remove the tier 2 role from a user and delete their membership record."""
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
        if str(user.id) not in self.bot.active_paid:
            await interaction.response.send_message(
                f"{user.display_name} is not currently marked as a tier 2 customer.",
                ephemeral=True,
            )
            return

        info = self.bot.active_paid[str(user.id)]
        role = guild.get_role(info["role_id"])
        if role is None:
            await interaction.response.send_message(
                "Tier 2 role not found. Please check the TIER_3_ROLE_ID.",
                ephemeral=True,
            )
            return

        # Remove the role and DM the user
        try:
            await user.remove_roles(role, reason="Revoked tier 2 membership")
            embed = discord.Embed(
                description=(
                    "## Je The System Elite lidmaatschap is beëindigd.\n\n"
                    "- Je hebt geen toegang meer tot de voordelen van The System Elite.\n"
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
        del self.bot.active_paid[str(user.id)]
        self.save_paid()

        # # Notify channel
        # channel = guild.get_channel(self.channel_id)
        # if channel is not None:
        #     try:
        #         await channel.send(f"{user.display_name} is no longer a paid customer.")
        #     except Exception:
        #         pass

        await interaction.response.send_message(
            f"The System Elite status verwijderd voor {user.mention}.",
            suppress_embeds=True,
        )
        

async def setup(bot: commands.Bot) -> None:
    """Load the PayingTier3 cog."""
    await bot.add_cog(PayingTier3(bot))
    print("PayingTier3 cog loaded")