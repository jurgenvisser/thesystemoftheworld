@extends('layouts.app')

@section('title', 'Coaching') <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Coaching</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center hidden lg:block">jouw eerste stap begint hier</h2>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Waarom je hier bent + Wat je hier kunt doen merged -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Waarom je hier bent</h2>
                <p class="text-base lg:text-lg mb-2">Je bent hier omdat je voelt dat het anders moet. Dat er meer in je zit. En dat je niet wéér motivatie wilt die verdwijnt. Je wilt iets dat blijft.</p>
                <p class="text-base lg:text-lg mb-2">Daarom is deze pagina er. Om jou vrijblijvend te laten kennismaken met The System. Zonder verplichtingen. Zonder druk.</p>
                <p class="text-base lg:text-lg mb-2">Wij hebben zelf de twijfel meegemaakt. The System is er niet zomaar. Het is de plek waar je eerlijk ontdekt of dit bij je past. Omdat wij het ook hebben gedaan.</p>
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times my-6">Wat je hier kunt doen</h2>
                <ul class="list-disc list-inside mb-6 text-base lg:text-lg">
                    <li>Stel je vraag aan ons team open en zonder oordeel.</li>
                    <li>Krijg direct uitleg over hoe The System jou helpt bouwen.</li>
                    <li>Laat je e-mailadres achter en we nemen persoonlijk contact met je op.</li>
                </ul>
            </div>
        </div>

        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">THE SYSTEM — Pakketten &amp; Diensten</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <!-- GRATIS -->
                    <div class="bg-colorPrimary/60 p-6 flex flex-col">
                        <h3 class="text-2xl font-bold mb-4">🎁 INSTAP – The System Community</h3>
                        <p class="mb-4 font-semibold">Gratis</p>
                        <p class="mb-4 text-base lg:text-lg">Voor iedereen die wil kennismaken met The System en wil proeven van mentale groei.</p>
                        <ul class="list-disc list-inside flex-1 mb-4 text-base lg:text-lg">
                            <li>Dagelijkse dagtips & mini-uitdagingen</li>
                            <li>Gratis weekplanner + maandplanner</li>
                            <li>Kennismaking met The System-filosofie</li>
                            <li>Korting op eerste coachingsessie</li>
                            <li>Toegang tot de Discord community</li>
                            <li>Toegang tot de volgende Discord kanalen en roles</li>
                            <ul class="list-disc list-inside flex-1 text-base lg:text-lg">
                                <li class="ml-4"><span class="inline-block px-3 rounded-full border-[2px] border-[#008000] bg-[#00800050] text-white">Instap</span> Discord Role</li>
                                <li class="ml-4">#stel-jezelf-voor</li>
                                <li class="ml-4">#gesprekken</li>
                                <li class="ml-4">#het-systeem</li>
                                <li class="ml-4">#off-topic</li>
                            </ul>
                        </ul>
                        <p class="font-semibold mt-auto text-base lg:text-lg">Resultaat: Je ervaart structuur, inspiratie en motivatie — zonder verplichting. De perfecte eerste stap naar mentale discipline.</p>
                    </div>

                    <!-- BASIS -->
                    <div class="bg-colorPrimary/60 p-6 flex flex-col">
                        <h3 class="text-2xl font-bold mb-4">💭 BASIS – Community &amp; Structuur</h3>
                        <p class="mb-4 font-semibold">€50 per maand (7 dagen proefperiode)</p>
                        <p class="mb-4 text-base lg:text-lg">Voor mensen die hun discipline willen opbouwen en structuur willen vinden.</p>
                        <ul class="list-disc list-inside flex-1 mb-4 text-base lg:text-lg">
                            <li>Alles van INSTAP</li>
                            <li>1 persoonlijke 1:1 sessie per week (online)<span class="text-xs align-super text-colorPrimary/50">****</span></li>
                            <li>Dagelijkse tips, check-ins &amp; challenges</li>
                            <li>Weekplanner &amp; maandplanner (gratis download)</li>
                            <li>Kennisbank over mindset, voeding &amp; beweging</li>
                            <li>Kortingen op coachingsessies en events</li>
                            <li>Community-opdrachten &amp; motivatie-video’s</li>
                            <li>Toegang tot de volgende Discord kanalen en roles</li>
                            <ul class="list-disc list-inside flex-1 text-base lg:text-lg">
                                <li class="ml-4"><span class="inline-block px-3 rounded-full border-[2px] border-[#0066ff] bg-[#0066ff50] text-white">Basis</span> Discord Role</li>
                                <li class="ml-4">#dagcheck</li>
                                <li class="ml-4">#uitdaging-van-de-week</li>
                                <li class="ml-4">#dagtips</li>
                                <li class="ml-4">#dagquote</li>
                                <li class="ml-4">#wekelijks-groepsgesprek en 1% Role op basis van inzet<span class="text-xs align-super text-colorPrimary/50">***</span></li>
                            </ul>
                        </ul>
                        <p class="font-semibold mt-auto text-base lg:text-lg">Resultaat: Rust, overzicht, structuur en motivatie. Je bouwt discipline en voelt je niet langer alleen.</p>
                    </div>

                    <!-- GROEI -->
                    <div class="bg-colorPrimary/60 p-6 flex flex-col">
                        <h3 class="text-2xl font-bold mb-4">🔥 GROEI – Coaching &amp; Doorbraak</h3>
                        <p class="mb-4 font-semibold">€100 per maand</p>
                        <p class="mb-4 text-base lg:text-lg">Voor mensen die echt verandering willen en persoonlijke begeleiding nodig hebben.</p>
                        <ul class="list-disc list-inside flex-1 mb-4 text-base lg:text-lg">
                            <li>Alles uit BASIS</li>
                            <li>2 persoonlijke 1:1 sessies per week (online)<span class="text-xs align-super text-colorPrimary/50">****</span></li>
                            <li>Wekelijks actieplan en reflectie</li>
                            <li>Direct contact via WhatsApp of Discord</li>
                            <li>Crisiscontact bij nood<span class="text-xs align-super text-colorPrimary/50">*</span></li>
                            <li>Aanpassing van schema’s (voeding, slaap, sport, emotie)</li>
                            <li>Groepsreflectie &amp; community-taken</li>
                            <li>Toegang tot de volgende Discord kanalen en roles</li>
                            <ul class="list-disc list-inside flex-1 text-base lg:text-lg">
                                <li class="ml-4"><span class="inline-block px-3 rounded-full border-[2px] border-[#dc143c] bg-[#dc143c50] text-white">Groei</span> Discord Role</li>
                                <li class="ml-4"><span class="inline-block px-3 rounded-full border-[2px] border-[#a300a3] bg-[#a300a350] text-white font-normal">1%</span> Discord Role</li>
                                <li class="ml-4">#wekelijks-groepsgesprek</li>
                                <li class="ml-4">Groepsgesprek (Voice)</li>
                                <li class="ml-4">Off Topic (Voice)</li>
                            </ul>
                        </ul>
                        <p class="font-semibold mt-auto text-base lg:text-lg">Resultaat: Doorbreek oude patronen, ontwikkel zelfvertrouwen en bouw een duurzaam ritme op.</p>
                    </div>

                    <!-- ELITE -->
                    <div class="bg-colorPrimary/60 p-6 flex flex-col">
                        <h3 class="text-2xl font-bold mb-4">🧠 ELITE – Mentale Meesterschap</h3>
                        <p class="mb-4 font-semibold">€150 per maand</p>
                        <p class="mb-4 text-base lg:text-lg">Voor mensen die volledig willen investeren in hun groei en vrijheid.</p>
                        <ul class="list-disc list-inside flex-1 mb-4 text-base lg:text-lg">
                            <li>Alles uit GROEI</li>
                            <li>Tot 6 contactmomenten per week<span class="text-xs align-super text-colorPrimary/50">*****</span></li>
                            <li>Persoonlijke roadmap: Rust → Energie → Doorbraak → Balans → Meesterschap</li>
                            <li>Maandelijkse groepscall</li>
                            <li>Crisiscoaching (24/7 beschikbaar)<span class="text-xs align-super text-colorPrimary/50">**</span></li>
                            <li>Exclusieve toegang tot The System Levensschema Pakket</li>
                            <li>Toegang tot de volgende Discord kanalen en roles</li>
                            <ul class="list-disc list-inside flex-1 text-base lg:text-lg">
                                <li class="ml-4"><span class="inline-block px-3 rounded-full border-[2px] border-[#d2691e] bg-[#d2691e50] text-white">Elite</span> Discord Role</li>
                                <li class="ml-4">#de-kern</li>
                                <li class="ml-4">#vip-communitykanaal + besloten content</li>
                                <li class="ml-4">Voice Kanaal (Voice)</li>
                            </ul>
                        </ul>
                        <p class="font-semibold mt-auto text-base lg:text-lg">Resultaat: Je bouwt mentale discipline, emotionele controle en focus. Je leeft volgens The System — niet half, maar volledig.</p>
                    </div>
                </div>

                <!-- Extra Diensten -->
                <div class="mt-12">
                    <h3 class="text-2xl font-bold mb-4">Extra Diensten</h3>
                    <table class="w-full text-left border-collapse border border-white text-base lg:text-lg">
                        <thead>
                            <tr class="bg-colorPrimary/40">
                                <th class="border border-white p-2">Dienst</th>
                                <th class="border border-white p-2">Beschrijving</th>
                                <th class="border border-white p-2">Prijs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-white p-2">Weekplanner download</td>
                                <td class="border border-white p-2">Structuurplanner</td>
                                <td class="border border-white p-2">Gratis</td>
                            </tr>
                            <tr>
                                <td class="border border-white p-2">Maandplanner download</td>
                                <td class="border border-white p-2">Maandelijkse focus &amp; discipline schema</td>
                                <td class="border border-white p-2">Gratis</td>
                            </tr>
                            <tr>
                                <td class="border border-white p-2">Reflectiesessie (30 min)</td>
                                <td class="border border-white p-2">Korte evaluatie of bijsturing</td>
                                <td class="border border-white p-2">€40</td>
                            </tr>
                            <tr>
                                <td class="border border-white p-2">Extra coachingsessie</td>
                                <td class="border border-white p-2">Extra verdieping of ondersteuning (60 min)</td>
                                <td class="border border-white p-2">€70</td>
                            </tr>
                            <tr>
                                <td class="border border-white p-2">Crisisconsult (dag)</td>
                                <td class="border border-white p-2">Noodgesprek binnen 24 uur</td>
                                <td class="border border-white p-2">€100</td>
                            </tr>
                            <tr>
                                <td class="border border-white p-2">Nachtconsult (22:00–06:00)</td>
                                <td class="border border-white p-2">Direct beschikbaar bij mentale nood of paniek</td>
                                <td class="border border-white p-2">€150</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pt-6"></div>
                @include('layouts.coaching-table')
                
                <p class="text-xs">
                    * Spoedondersteuning is beschikbaar tot 2 uur 's nachts op basis van redelijkheid en in overleg.<br>
                    ** 24/7 spoedondersteuning moet altijd in overleg worden aangevraagd om de beschikbaarheid van coaches te waarborgen.<br>
                    *** Toegang tot het wekelijkse groepsgesprek en de 1% rol is afhankelijk van actieve deelname en inzet binnen de community bij het Basis pakket.<br>
                    **** Contactmomenten hebben een standaardduur van 30 tot 60 minuten, afhankelijk van de behoefte en het pakket.<br>
                    ***** Het aantal contactmomenten per week kan variëren afhankelijk van de beschikbaarheid van de coach en behoeften van de cliënt bij het Elite pakket.
                </p>

                <p class="text-base lg:text-lg mb-6 mt-12">Wil je pakketten vergelijken? <a href="javascript:void(0);" class="text-colorPrimary" onclick="openComparePopup()">Klik dan hier!</a></p> {{-- !This needs working on first thing tomorrow --}}

                <p class="text-base lg:text-lg mb-6 mt-12">Als dit iets is dat jou aanspreekt? Vertel ons hoe we je kunnen bereiken en Quinn plant zo snel mogelijk een kennismaking met je in.</p>
                <div class="mb-6">
                    <a href="{{ $brevoFormLink }}" class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800">Laat je gegevens achter!</a>
                </div>
            </div>
        </div>

        <!-- Resultaten / Reviews Section -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Resultaten / Reviews</h2>
                <p class="text-base lg:text-lg mb-6">Onze leden behalen indrukwekkende resultaten met The System. Hieronder enkele ervaringen en reviews van mensen die jou voorgingen.</p>
                <p class="text-base lg:text-lg italic">[Hier komen binnenkort testimonials en succesverhalen]</p>
            </div>
        </div>

        <!-- Zo werkt onze aanpak Section -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Zo werkt onze aanpak</h2>
                <ol class="list-decimal list-inside space-y-4 text-base lg:text-lg">
                    <li><strong>Intake</strong> – We starten met een persoonlijk gesprek om jouw doelen en wensen te begrijpen.</li>
                    <li><strong>Kennismaking</strong> – Maak kennis met je coach en de methodiek van The System.</li>
                    <li><strong>Plan</strong> – Samen stellen we een plan op dat past bij jouw situatie en ambities.</li>
                    <li><strong>Coaching</strong> – Je ontvangt begeleiding en tools om je doelen te behalen.</li>
                    <li><strong>Groei</strong> – Je ontwikkelt jezelf en bouwt aan duurzame verandering.</li>
                </ol>
            </div>
        </div>

        <!-- Disclaimer Section -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Disclaimer</h2>
                <p class="text-base lg:text-lg">The System biedt mentale begeleiding en persoonlijke structuurcoaching – geen therapie of behandeling. Onze coaching richt zich op persoonlijke groei, structuur en motivatie. Wij stellen geen diagnoses en vervangen geen professionele zorg. Bij ernstige klachten adviseren wij contact op te nemen met een gekwalificeerde zorgverlener.</p>
            </div>
        </div>

    </div>
</div>

@endsection
