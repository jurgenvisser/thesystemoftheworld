@extends('layouts.app')

@section('title', 'Community')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-5 lg:bg-h-backdrop-2 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times">Community</h1>
                {{-- <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times">Neem deel op de socials</h2> --}}

            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10 items-stretch">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
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
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
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
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
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

        @include('layouts.discord-iframe') {{-- This includes the Discord iframe component --}}

    </div>
</div>

@endsection