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
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10 items-stretch">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Community</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Je denkt dat je discipline mist. Wat je mist… is omgeving.
                    </p>
                    <p class="text-base lg:text-lg font-bold mb-2 px-4 lg:px-0">
                        Mensen om je heen bepalen je tempo.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System stap je in een community die eist dat je beter wordt. Geen applaus voor stilstand. Geen ruimte voor excuses. <span class="font-bold">Alleen vooruitgang...</span>
                    </p>
                    <h1 class="px-4 lg:px-0 text-xl lg:text-2xl font-bold uppercase font-times">Wat betekent dat voor jou?</h1>
                    <ul class="mb-6 text-base lg:text-lg px-4 lg:px-0 space-y-2 list-disc list-inside">
                        <li>
                            Je krijgt directe feedback van mensen die je snappen
                        </li>
                        <li>
                            Je ontwikkelt mentaal leiderschap omdat we dat elke dag trainen
                        </li>
                        <li>
                            Je groeit sneller omdat je het niet meer alleen doet
                        </li>
                        <li>
                            Je valt soms… maar je valt nooit alleen
                        </li>
                    </ul>

                    <p class="text-base lg:text-lg font-bold mb-2 px-4 lg:px-0">
                        Dit is geen motivatiegroep.
                    </p>
                    <!-- Extra space between the text and the follow text -->
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Dit is een netwerk van mensen die willen winnen. <br>
                        En jou meenemen mits je durft te verschijnen.
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
                        Hier vind je links naar al onze platformen waar The System actief is. Onze sociale media zijn meer dan gewoon content; ze zijn een plek waar we samenkomen als community, elkaar ondersteunen en inspireren. Ons platform telt momenteel {{ $totalFollowerCount }} volgers, en we groeien elke dag. Word jij onze volgende volger?
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

        @include('layouts.discord-iframe') {{-- This includes the Discord iframe component --}}

    </div>
</div>

@endsection