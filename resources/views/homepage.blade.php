@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

{{-- #Dump Session Data for API token retrieval debugging --}}
{{-- @php
    dd(session()->all());
@endphp --}}

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times hidden lg:block">The System</h1>
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times block lg:hidden">Jouw verhaal</h1>
                <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times text-balance text-center hidden lg:block">Jouw Verhaal, Jouw Kracht</h2>
                <h2 class="text-4xl lg:text-4xl text-colorLight font-bold uppercase font-times text-balance text-center block lg:hidden">Jouw Kracht</h2>
                <h2 class="text-xl lg:text-4xl text-colorLight uppercase text-balance text-center block">Samen met nog <span class="font-bold">{{ $totalFollowerCount }}</span> anderen.</h2>
                {{-- <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times text-balance text-center block">{{ json_encode($tiktokDebugHeaders, JSON_PRETTY_PRINT) }}</h2> --}}
            </div>

        </div>
    </div>
</div>
o
<!-- Scroll Banner Section -->
{{-- @include('layouts.discord-scroll-banner') --}}
@include('layouts.homepage-scroll-banner')

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10 items-stretch">
       
        <!-- Image Section (2/6) -->
        <div class="relative bg-black col-span-2 hidden lg:block h-full overflow-hidden">
            <!-- Blurred Background -->
            <img src="{{ asset('images/TheSystemProfilePicture.jpeg') }}" 
                 alt="The System Quinn Background"
                 class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-50 scale-110">
            
            <!-- Main Square Image -->
            <div class="absolute inset-0 flex justify-center items-center">
                <img src="{{ asset('images/TheSystemProfilePicture.jpeg') }}" 
                     alt="The System Quinn Main" 
                     class="object-cover aspect-square max-h-[100%] max-w-[100%] shadow-2xl">
            </div>
        </div>

        <!-- Call-To-Action Section (6/6) -->
        <div class="h-auto lg:h-full col-span-4 flex items-stretch">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Updated Call-To-Action Content -->
                <div class="">
                    <h2 class="mb-6 lg:mb-8 px-4 lg:px-0 text-4xl lg:text-5xl uppercase">
                        Jouw vaste platform voor <span class="font-bold">mentale gezondheid</span>
                        <span class="clover-chess"></span>
                    </h2>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        We onderhouden alles… behalve ons hoofd. 
                        The System is jouw maandelijkse mentale onderhoud. 
                        Niet praten over verandering maar dóen.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Jij traint je lichaam, betaalt je huur, zorgt voor stroom maar wanneer onderhoud je je hoofd? 
                        The System leert je structuur, rust en mentale discipline. 
                        Elke maand. Voor altijd.
                    </p>
                    <a
                        href="/coaching"
                        class="bg-black text-colorLight rounded hover:ring hover:ring-colorPrimary py-3 px-6 mx-4 lg:mx-0 hover:bg-gray-800 text-lg lg:text-xl">
                        Ontdek jouw traject!
                    </a>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 h-full text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-center text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    {{-- <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Je mentale onderhoud begint hier</h1> --}}
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Jouw verhaal, jouw kracht</h1>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Je voelt je leeg, moe of vast in je eigen gedachten. Dat is niet zwak — het is een signaal dat je hoofd onderhoud nodig heeft.
                    </p>
                    <p class="text-base font-bold lg:text-lg mb-2 px-4 lg:px-0">
                        Wat The System doet:
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Bij The System leer je je hoofd onderhouden, net zoals je je lichaam onderhoudt. Elke maand, elke dag, helpen we je stap voor stap rust, structuur en discipline terug te krijgen — samen met anderen die hetzelfde pad lopen.
                    </p>
                    <p class="text-base font-bold lg:text-lg mb-2 px-4 lg:px-0">
                        Waarom dit werkt:
                    </p>
                    <ul class="list-disc list-outside ml-5 mb-4 text-base lg:text-lg px-4 lg:px-0">
                        <li>Geen masker, geen oordeel — alleen echte groei</li>
                        <li>Concrete modules en dagelijkse routines die je mentale kracht vergroten</li>
                        <li>Community die je ondersteunt en scherp houdt</li>
                        <li>Persoonlijke check-ins en begeleiding van Quinn en ons coaching-team</li>
                    </ul>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Jij hoeft dit niet alleen te dragen. Start vandaag je mentale onderhoud en bouw een systeem dat bij je blijft.
                    </p>
                    <a
                        href="{{ $brevoFormLink }}"
                        class="text-base lg:text-lg text-colorLight animate-underline animate-text-color theme-primary">
                        Meld je aan bij The System
                    </a>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 h-full text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Jou mentale voorsprong</h1>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Voel je je vast of leeg in je hoofd? Niks doen verandert niks. Met The System krijg je structuur, coaching en een community die je echt vooruit helpt.
                    </p>
                    <p class="text-base lg:text-lg font-bold mb-4 px-4 lg:px-0">
                        Zo ga je vooruit:
                    </p>
                    <ul class="list-disc list-outside ml-5 mb-4 text-base lg:text-lg px-4 lg:px-0 text-left">
                        <li><span class="font-bold">Modules</span>: Academy-style plannen om zelf de macht weer terug in handen te nemen.</li>
                        <li><span class="font-bold">Coaching</span>: Mentorship van iemand die het zelf heeft doorleefd</li>
                        <li><span class="font-bold">Community</span>: Samen groeien, feedback en inspiratie</li>
                    </ul>
                    <p class="text-base lg:text-lg font-bold px-4 lg:px-0">
                        Resultaat
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Stop met vastzitten in stress, twijfel en uitstel.
                        Herstel controle over je hoofd, bouw een leven met structuur en kracht, en word mentaal sterker.
                        Wij redden levens door mensen te leren hoe ze zichzelf écht kunnen redden.
                    </p>
                </div>
            </div>
        </div>

        <!-- BText Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 h-full text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">The System Blueprint?</h1>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Dit is geen standaard theorie. Dit is je eigen leerboek voor je hoofd. 
                        Elke module is een les in mentale kracht, discipline en groei. 
                        Stap voor stap leer je je hoofd onderhouden en bouw je skills die je écht vooruit helpen voor nu én voor de rest van je leven.
                    </p>
                    <p class="text-base lg:text-lg font-bold mb-4 px-4 lg:px-0">
                        Wat je gaat leren:
                    </p>
                    <ul class="list-disc list-outside ml-5 mb-4 text-base lg:text-lg px-4 lg:px-0 text-left">
                        <li><span class="font-bold">Gedachten & Emoties</span>: grip op je hoofd, rust en zelfvertrouwen.</li>
                        <li><span class="font-bold">Discipline & Structuur</span>: routines, focus en doorzettingsvermogen</li>
                        <li><span class="font-bold">Stress & Mentale Rust</span>: omgaan met druk, burn-out en moeilijke dagen</li>
                        <li><span class="font-bold">Relaties & Groei</span>: sociale kracht, zelfreflectie en persoonlijke ontwikkeling</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Quote Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <h2 class="mb-4 px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
                    De <span class="font-bold">keuze</span> is aan jou. Blijf hangen, of bouw je leven?
                    <span class="clover-chess"></span>
                </h2>
                <p class="text-base lg:text-lg mt-4 px-4 lg:px-0">
                    Volg The System. Geen onzin. <span class="block lg:inline"> Alleen resultaat.</span><br>
                    TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                </p>

            </div>
        </div>


    </div>
</div>

@endsection