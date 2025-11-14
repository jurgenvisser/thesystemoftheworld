import discord
from discord.ext import commands
from discord import app_commands

# verwijder dit als het klaar is
# import os
# from dotenv import load_dotenv
# import asyncio

# load_dotenv()

# # Determine the guild object for slash command registration. Commands in this cog
# # will be registered to the specific guild specified by ``DISCORD_GUILD_ID``. If the
# # environment variable is not set or invalid, commands will be global.
# try:
#     _GUILD_ID: int | None = int(os.getenv("DISCORD_GUILD_ID")) if os.getenv("DISCORD_GUILD_ID") else None
# except (TypeError, ValueError):
#     _GUILD_ID = None

# _GUILD = discord.Object(id=_GUILD_ID) if _GUILD_ID else None
# tot en met hier

class CognitiveReset(commands.Cog):
    def __init__(self, bot: commands.Bot):
        self.bot = bot

    @app_commands.command(name="focus", description="Start een korte focus- en stress-oefening in DM")
    # @app_commands.guilds(_GUILD) #deze ook weg 
    async def focus(self, interaction: discord.Interaction):
        # Stuur eerste bericht
        try:
            await interaction.response.send_message(
                "Oké luister. We gaan een korte focus-oefening doen om je geest weer terug te halen naar een positief hier en nu. Zullen we beginnen?\n",
                ephemeral=True
            )
        except discord.Forbidden:
            return  # Als bot geen DM kan sturen

        # Open een DM
        dm_channel = await interaction.user.create_dm()

        # Niveau 1 — Directe Afleiding
        embed = discord.Embed(
            description=(
                "## Niveau 1 — Directe Afleiding\n"
                "We gaan vier opdrachten doen. Beantwoord elke opdracht voordat je verdergaat."
            ),
            color=discord.Color(0x62DFE6)
        )
        await dm_channel.send(embed=embed)

        def check(m):
            return m.author == interaction.user and m.channel == dm_channel

        try:
            await dm_channel.send("**1.** Noem 5 dingen om je heen die **zacht** of **koud** zijn.")
            msg1 = await self.bot.wait_for('message', check=check, timeout=180)

            # Opdracht 2 aangepast: gebruiker hoeft niet te typen, maar bevestigt met ✅
            task2_msg = await dm_channel.send("**2.** Tel terug van **60** naar **0** in stappen van **3** in je hoofd.\n"
                                              "Bevestig met ✅ als je klaar bent.")
            await task2_msg.add_reaction("✅")

            def reaction_check(reaction, user):
                return (
                    user == interaction.user and
                    reaction.message.id == task2_msg.id and
                    str(reaction.emoji) == "✅"
                )

            await self.bot.wait_for('reaction_add', timeout=180.0, check=reaction_check)

            await dm_channel.send("**3.** Raak 1 **koud**, 1 **zacht**, 1 **hard** ding aan en beschrijf ze.")
            msg3 = await self.bot.wait_for('message', check=check, timeout=180)

            await dm_channel.send("**4.** Noem **3 liedjes** zonder te denken.")
            msg4 = await self.bot.wait_for('message', check=check, timeout=180)

            await dm_channel.send("Goed. Je brein is nu uit de chaos-modus.\n")
        except asyncio.TimeoutError:
            await dm_channel.send("Je hebt te lang gewacht, probeer opnieuw.")
            return

        # Niveau 2 — Controle Opdracht (reaction-based)
        embed = discord.Embed(
            description=(
                "## Niveau 2 — Controle Opdracht\n"
                "Kies 1 missie door te reageren:\n"
                "- 🟦 Blue Mission – Rust\n"
                "- 🟩 Green Mission – Actie\n"
                "- 🟥 Red Mission – Kracht\n"
                "- 🟨 Yellow Mission – Focus"
            ),
            color=discord.Color(0x62DFE6)
        )
        control_msg = await dm_channel.send(embed=embed)
        reactions = {
            "🟦": {"text": "### Blue Mission – Rust\nDenk aan iets dat je **kalmeert**. Beschrijf het in één zin.", "color": 0x55ACEE},
            "🟩": {"text": "### Green Mission – Actie\nWat is één **kleine actie** die je nu kunt doen om vooruit te komen?", "color": 0x78B059},
            "🟥": {"text": "### Red Mission – Kracht\nNoem één ding waar je **kracht** uit haalt.", "color": 0xDD2D44},
            "🟨": {"text": "### Yellow Mission – Focus\nWat is je belangrijkste **focuspunt** voor nu?", "color": 0xFDCB59}
        }

        for emoji in reactions.keys():
            await control_msg.add_reaction(emoji)

        def reaction_check(reaction, user):
            return (
                user == interaction.user and 
                reaction.message.id == control_msg.id and 
                str(reaction.emoji) in reactions
            )

        try:
            reaction, user = await self.bot.wait_for('reaction_add', timeout=180.0, check=reaction_check)
            chosen_emoji = str(reaction.emoji)
            mission_data = reactions[chosen_emoji]
            embed = discord.Embed(description=mission_data["text"], color=discord.Color(mission_data["color"]))
            await dm_channel.send(embed=embed)
            
            # Wait for the user's response to the mission question
            msg2 = await self.bot.wait_for('message', check=check, timeout=180)
            await dm_channel.send("Goed. Je hebt nu weer richting.\n")
        except asyncio.TimeoutError:
            await dm_channel.send("Je hebt te lang gewacht, probeer opnieuw.")
            return

        # Niveau 3 — Vanuit een rol reageren (reaction-based)
        embed = discord.Embed(
            description=(
                "## Niveau 3 — Vanuit een rol reageren\n"
                "Kies jouw System-rol voor dit moment door te reageren:\n"
                "- 1️⃣ De Rustige\n"
                "- 2️⃣ De Denker\n"
                "- 3️⃣ De Doener\n"
                "- 4️⃣ De Oplosser\n"
                "- 5️⃣ De Leider"
            ),
            color=discord.Color(0x62DFE6)
        )
        identity_msg = await dm_channel.send(embed=embed)
        identity_reactions = {
            "1️⃣": "De Rustige",
            "2️⃣": "De Denker",
            "3️⃣": "De Doener",
            "4️⃣": "De Oplosser",
            "5️⃣": "De Leider"
        }

        for emoji in identity_reactions.keys():
            await identity_msg.add_reaction(emoji)

        def identity_reaction_check(reaction, user):
            return (
                user == interaction.user and
                reaction.message.id == identity_msg.id and
                str(reaction.emoji) in identity_reactions
            )

        try:
            reaction, user = await self.bot.wait_for('reaction_add', timeout=180.0, check=identity_reaction_check)
            chosen_identity = identity_reactions[str(reaction.emoji)]
            await dm_channel.send(
                f"Oké. Wat zou die versie van jou nú doen? Geef me 1 actie. Klein, direct."
            )
            msg4 = await self.bot.wait_for('message', check=check, timeout=180)
        except asyncio.TimeoutError:
            await dm_channel.send("Je hebt te lang gewacht, probeer opnieuw.")
            return

        # Ending
        embed = discord.Embed(
            description=(
                "## Goed gedaan.\n"
                "Je hebt jezelf net binnen 2–3 minuten uit de stress gehaald.\n"
                "Dit heet controle. Dit is **The System**."
             ),
            color=discord.Color(0x62DFE6)
        )
        await dm_channel.send(embed=embed)

async def setup(bot: commands.Bot):
    await bot.add_cog(CognitiveReset(bot))