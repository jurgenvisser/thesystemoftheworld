@extends('layouts.app')

@section('title', 'Community')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-5 lg:bg-h-backdrop-2 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Community</h1>
                {{-- <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times">Neem deel op de socials</h2> --}}

            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Community</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System draait alles om de kracht van onze community. Wij zijn een groep mensen die elkaar steunen, motiveren en samen groeien. Onze sociale media zijn meer dan alleen een plek voor inspiratie; het is een ruimte voor echte connectie. Hier vind je mensen die begrijpen wat jij doormaakt, die dezelfde uitdagingen en dromen delen. Samen staan we sterker.
                    </p>
                    <h1 class="px-4 lg:px-0 text-xl lg:text-2xl font-bold uppercase font-times">Wat doet dit voor jou?</h1>
                    <ul class="mb-6 text-base lg:text-lg px-4 lg:px-0 space-y-4 list-disc list-inside">
                        <li>
                            <span class="font-bold">Een sterke, ondersteunende gemeenschap</span> – In onze groep vind je mensen die jou begrijpen en die bereid zijn om hun kennis en ervaring met je te delen. Je bent nooit alleen.
                        </li>
                        <li>
                            <span class="font-bold">Motivatie en kracht</span> – Onze community is er om jou te helpen focussen op je doelen en om je elke dag aan te moedigen om door te zetten.
                        </li>
                        <li>
                            <span class="font-bold">Gezamenlijke groei</span> – Samen vieren we successen en leren we van onze fouten. Hier wordt elke stap vooruit gewaardeerd en zijn we trots op wat we samen bereiken.
                        </li>
                    </ul>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Het niet alleen om wat je leert, maar ook om wie je ontmoet. Onze community is de sleutel tot jouw succes. Sluit je aan en wees deel van een groep die je helpt om jouw dromen werkelijkheid te maken.
                    </p>
                    <!-- Extra space between the text and the follow text -->
                    <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System voor meer! <br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p>
                </div>

            </div>
        </div>

        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="w-full">
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Vragenlijst voor coachingtraject</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Wil je coaching of meer uit onze community halen? Vul onze vragenlijst in en geef aan waar je hulp bij zoekt. Zo kunnen we je beter ondersteunen met advies op maat.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Of je nu coaching wilt, inspiratie zoekt, of gewoon advies nodig hebt, wij staan voor je klaar. Zet vandaag nog de eerste stap naar persoonlijke groei.
                    </p>
                    <a href="https://forms.gle/jN5JT6UuNTTsaoMy7" class="bg-colorPrimary text-white text-base md:text-lg lg:text-xl px-6 py-2 rounded-lg shadow hover:bg-colorPrimary/40 w-full">
                        📋 Klik hier en meld je aan ✍️
                    </a>
                </div>
            </div>
        </div>


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Social Media</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Welkom op onze Social Media pagina! Hier vind je links naar al onze platformen waar The System actief is. Onze sociale media zijn meer dan gewoon content; ze zijn een plek waar we samenkomen als community, elkaar ondersteunen en inspireren.
                    </p>
                    <p class="text-base lg:text-lg mb-8 px-4 lg:px-0">
                        Klik op de knoppen hieronder om deel uit te maken van onze beweging en te blijven groeien, leren en doorzetten met The System.
                    </p>
                    <div class="md:flex space-y-2 md:space-y-0 md:space-x-4 lg:space-x-8 justify-center md:justify-start w-full md:pl-4 lg:pl-0">
                        <div class="flex space-x-4 lg:space-x-8 justify-center lg:justify-start">
                            <div class="rounded-full flex items-center justify-center">
                                <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-tiktok-white bg-cover rounded-lg flex items-center justify-center">
                                    <!-- TikTok Icon -->
                                </a>
                            </div>
                            <div class="rounded-full flex items-center justify-center">
                                <a href="{{ $discordLink }}" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-discord-white bg-cover rounded-lg flex items-center justify-center">
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
                                <a href="https://www.facebook.com/thesystemoftheworld" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-facebook-white bg-cover rounded-lg flex items-center justify-center">
                                    <!-- Facebook Icon -->
                                </a>
                            </div>
                            <div class="rounded-full flex items-center justify-center">
                                <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="w-12 lg:w-16 h-12 lg:h-16 bg-youtube-white bg-contain bg-center bg-no-repeat rounded-lg flex items-center justify-center">
                                    <!-- YouTube Icon -->
                                </a>
                            </div>
                            {{-- <div class="rounded-full flex items-center justify-center">
                                <a href="https://wa.me/31645603530" class="w-12 lg:w-16 h-12 lg:h-16 bg-whatsapp-white bg-cover flex items-center justify-center">
                                    <!-- WhatsApp Icon -->
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('components.discord-iframe') {{-- This includes the Discord iframe component --}}

        
    </div>
</div>

@endsection