@extends('layouts.app')

@section('title', 'Community')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->

<x-standard-hero 
    label="De kracht van Ons"
    title="Community" 
    subtitle="Je hoort erbij. Houd je focus en kracht vast."
    background="bg-v-backdrop-5 lg:bg-h-backdrop-2"
/>


<!-- Main Content Section -->

<!-- SECTIE: DE VIER WAARDEN VAN DE COMMUNITY (KORT EN KRUIDIG) -->
<section id="waarden" class="px-12 py-20 md:py-32 bg-black">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-colorLight mb-4">ONZE WAARDEN</h2>
            <p class="text-zinc-500 text-lg">Jij bent verantwoordelijk. Wij houden je scherp.</p>
        </div>
        
        <div class="grid md:grid-cols-4 gap-8">
            
            <!-- Waarde 1: ACCOUNTABILITY -->
            <div class="p-6 border border-zinc-800 bg-zinc-900/40 text-center hover:border-colorPrimary transition-colors card-shadow">
                <x-lucide-check-circle class="w-12 h-12 text-colorPrimary mx-auto mb-4" />
                <h3 class="text-lg font-mono text-colorLight mb-2 uppercase tracking-wider">Verantwoordelijkheid</h3>
                <p class="text-zinc-400 text-sm">Je bent verplicht te leveren. Geen excuses.</p>
            </div>

            <!-- Waarde 2: FEEDBACK -->
            <div class="p-6 border border-zinc-800 bg-zinc-900/40 text-center hover:border-colorPrimary transition-colors card-shadow">
                <x-lucide-message-square-warning class="w-12 h-12 text-colorPrimary mx-auto mb-4" />
                <h3 class="text-lg font-mono text-colorLight mb-2 uppercase tracking-wider">Harde Feedback</h3>
                <p class="text-zinc-400 text-sm">Echte vooruitgang doet pijn. Wij helpen je erdoor.</p>
            </div>

            <!-- Waarde 3: INSPIRATIE -->
            <div class="p-6 border border-zinc-800 bg-zinc-900/40 text-center hover:border-colorPrimary transition-colors card-shadow">
                <x-lucide-flame class="w-12 h-12 text-colorPrimary mx-auto mb-4" />
                <h3 class="text-lg font-mono text-colorLight mb-2 uppercase tracking-wider">Mentale Brandstof</h3>
                <p class="text-zinc-400 text-sm">Eén zin die je nodig hebt om de dag te overleven.</p>
            </div>

            <!-- Waarde 4: AFSLUITING -->
            <div class="p-6 border border-zinc-800 bg-zinc-900/40 text-center hover:border-colorPrimary transition-colors card-shadow">
                <x-lucide-shield-off class="w-12 h-12 text-colorPrimary mx-auto mb-4" />
                <h3 class="text-lg font-mono text-colorLight mb-2 uppercase tracking-wider">Zonder Oordeel</h3>
                <p class="text-zinc-400 text-sm">Wat hier gebeurt, blijft hier. Je bent veilig.</p>
            </div>

        </div>
    </div>
</section>

<!-- SECTIE: SOCIAL MEDIA + DIRECTE JOIN CTA -->
<section id="socials" class="px-12 py-20 md:py-32 bg-zinc-950 border-t border-b border-zinc-800">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        
        <!-- Tekst & CTA -->
        <div class="space-y-8">
            <span class="font-mono text-xs uppercase tracking-widest text-colorPrimary border-b border-colorPrimary pb-2">HET NETWERK</span>

            <h2 class="text-4xl md:text-5xl font-bold text-colorLight leading-tight">
                VOLG & DOE MEE. MENTAAL ONDERHOUD START <span class="text-colorPrimary">HIER</span>.
            </h2>

            <p class="text-zinc-400 text-lg">
                Stop met excuses. Stop met scrollen. Mentale kracht onderhoud je elke dag en wij geven je de tools, structuur en discipline om te winnen.
            </p>
            <p class="text-zinc-400 text-lg font-bold">
                Doe mee. Word sterker. Verander je leven.
            </p>

            <a href="https://discord.com" target="_blank" 
               class="inline-block px-8 py-4 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/90 transition-all">
                JOIN DE DISCORD NU
            </a>
        </div>

        <!-- SOCIAL LOGOS -->
        <div class="flex flex-col gap-4 text-sm md:text-base">

            <!-- Discord -->
            <a href="{{ $discordInviteLink }}" target="_blank" 
               class="flex items-center justify-between p-4 bg-black border border-zinc-700 hover:border-colorPrimary transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-6 aspect-[1/1] bg-discord-white bg-cover bg-center block"></span>
                    <span class="font-mono text-colorLight uppercase tracking-widest w-full">DISCORD (24/7 Support)</span>
                </div>
                <span class="text-colorPrimary font-mono text-sm">JOIN</span>
            </a>

            <!-- Instagram -->
            <a href="https://instagram.com" target="_blank" 
               class="flex items-center justify-between p-4 bg-black border border-zinc-700 hover:border-colorPrimary transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-6 aspect-[1/1] bg-instagram-white bg-cover bg-center block"></span>
                    <span class="font-mono text-colorLight uppercase tracking-widest">INSTAGRAM</span>
                </div>
                <span class="text-colorPrimary font-mono text-sm">VOLG</span>
            </a>

            <!-- TikTok -->
            <a href="https://tiktok.com" target="_blank" 
               class="flex items-center justify-between p-4 bg-black border border-zinc-700 hover:border-colorPrimary transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-6 aspect-[1/1] bg-tiktok-white bg-cover bg-center block"></span>
                    <span class="font-mono text-colorLight uppercase tracking-widest">TIKTOK</span>
                </div>
                <span class="text-colorPrimary font-mono text-sm">VOLG</span>
            </a>

            <!-- Facebook -->
            <a href="https://facebook.com" target="_blank" 
               class="flex items-center justify-between p-4 bg-black border border-zinc-700 hover:border-colorPrimary transition-colors">
                <div class="flex items-center gap-4">
                    <span class="h-6 aspect-[1/1] bg-facebook-white bg-cover bg-center block"></span>
                    <span class="font-mono text-colorLight uppercase tracking-widest">FACEBOOK</span>
                </div>
                <span class="text-colorPrimary font-mono text-sm">VOLG</span>
            </a>

            <!-- YouTube -->
            <a href="https://youtube.com" target="_blank" 
               class="flex items-center justify-between p-4 bg-black border border-zinc-700 hover:border-colorPrimary transition-colors">
                <div class="flex items-center gap-4">
                    <span class="w-6 aspect-[1.5/1] bg-youtube-white bg-cover bg-center block"></span>
                    <span class="font-mono text-colorLight uppercase tracking-widest">YOUTUBE</span>
                </div>
                <span class="text-colorPrimary font-mono text-sm">VOLG</span>
            </a>

        </div>
    </div>
</section>

@endsection


{{-- <div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10 items-stretch">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Community</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Je denkt dat je discipline mist? Het probleem is niet jij. Het is je omgeving.
                    </p>
                    <p class="text-base lg:text-lg font-bold mb-4 px-4 lg:px-0">
                        Bij The System stap je in een netwerk dat eist dat je beter wordt. Geen excuses. Geen applaus voor stilstand. Alleen vooruitgang.
                    </p>
                    <h1 class="px-4 lg:px-0 text-xl flex-1 w-full lg:text-2xl font-bold uppercase font-times">Wat dit jou oplevert:</h1>
                    <ul class="mb-4 text-base lg:text-lg px-4 lg:px-0 space-y-2 list-disc list-inside">
                        <li><span class="font-bold">Eerlijke feedbac</span>k van mensen die je écht begrijpen.</li>
                        <li><span class="font-bold">Mentaal leiderschap</span> door dagelijkse training en challenges.</li>
                        <li><span class="font-bold">Sneller groeien</span> omdat je het niet alleen hoeft te doen.</li>
                        <li><span class="font-bold">Altijd steun</span> je valt soms, maar nooit alleen.</li>
                    </ul>

                    <p class="text-base lg:text-lg font-bold mb-2 px-4 lg:px-0">
                        Dit is geen motivatiegroep.
                    </p>
                    <!-- Extra space between the text and the following text -->
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Dit is een community van winnaars.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Durf jij erbij te horen?
                    </p>
                </div>

            </div>
        </div>

        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="w-full">
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Jouw groei wacht niet</h1>
                    <p class="text-base lg:text-lg mb-4">
                        Wil jij echt vooruit? Laat ons zien waar je vastloopt.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Vul de vragenlijst in en krijg coaching en advies op maat, afgestemd op jouw situatie en doelen.
                    </p>
                    <a href="{{ $brevoFormLink }}" class="bg-black text-colorLight rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                        📋 Start nu ✍️
                    </a>
                </div>
            </div>
        </div>


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-4">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Je staat er niet alleen voor</h1>
    
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Je weet dat je vastloopt. Dat het hoofdchaos is, dat motivatie verdwijnt, dat je niet vooruitkomt?
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Dat is precies waarom onze social media er zijn. Niet voor likes, niet voor oppervlakkige content. Voor echte mensen die écht willen groeien.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Hier vind je een community die je uitdaagt, steunt en wakker schudt.
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Samen met <span class="font-bold text-colorPrimary">{{ $totalFollowerCount }} anderen</span> leer je discipline, focus en mentale kracht elke dag opnieuw.
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Sluit je aan. Word onderdeel van de beweging.
                    </p>
                    <p class="text-base lg:text-lg mb-8 px-4 lg:px-0">
                        Klik op de knoppen hieronder en begin met bouwen aan je hoofd en je leven.
                    </p>
                    <div class="md:flex space-y-2 md:space-y-0 md:space-x-4 lg:space-x-8 justify-center md:justify-start w-full md:pl-4 lg:pl-0">
                        <div class="flex space-x-4 lg:space-x-8 justify-center lg:justify-start">
                            <div class="rounded-full flex items-center justify-center">
                                <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-tiktok-white bg-cover rounded-lg flex items-center justify-center">
                                    <!-- TikTok Icon -->
                                </a>
                            </div>
                            <div class="rounded-full flex items-center justify-center">
                                <a href="{{ $discordInviteLink }}" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-discord-white bg-cover rounded-lg flex items-center justify-center">
                                    <!-- Discord Icon -->
                                </a>
                            </div>
                            <div class="rounded-full flex items-center justify-center">
                                <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-instagram-white bg-cover rounded-lg flex items-center justify-center">
                                    <!-- Instagram Icon -->
                                </a>
                            </div>
                        </div>
                        <div class="flex space-x-4 lg:space-x-8 justify-center lg:justify-start">
                            <div class="rounded-full flex items-center justify-center">
                                <a href="https://www.facebook.com/people/The-System/61578064385680/" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-facebook-white bg-cover rounded-lg flex items-center justify-center">
                                    <!-- Facebook Icon -->
                                </a>
                            </div>
                            <div class="rounded-full flex items-center justify-center">
                                <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-youtube-white bg-contain bg-center bg-no-repeat rounded-lg flex items-center justify-center">
                                    <!-- YouTube Icon -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
 --}}
