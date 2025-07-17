@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times hidden lg:block">The System</h1>
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times block lg:hidden">Jouw verhaal</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center hidden lg:block">Jouw Verhaal, Jouw Kracht</h2>
                <h2 class="text-4xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center block lg:hidden">Jouw Kracht</h2>
                <h2 class="text-xl lg:text-4xl text-white uppercase text-balance text-center block">Samen met nog <span class="font-bold">{{ $totalFollowerCount }}</span> anderen.</h2>
                {{-- <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center block">{{ json_encode($tiktokDebugHeaders, JSON_PRETTY_PRINT) }}</h2> --}}
            </div>

        </div>
    </div>
</div>
o
<!-- Scroll Banner Section -->
@include('layouts.discord-scroll-banner')

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10 items-stretch">
       
        <!-- Image Section (2/6) -->
        <div class="bg-black col-span-2 hidden lg:block h-full">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                <image id="theme-image-homepage-logo-full" href="{{ asset('images/logos/TheSystemFull.svg') }}" class="w-full h-full object-cover" />
            </svg>
        </div>

        <!-- Call-To-Action Section (6/6) -->
        <div class="h-auto lg:h-full col-span-4 flex items-stretch">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Updated Call-To-Action Content -->
                <div class="">
                    <h2 class="mb-8 lg:mb-16 px-4 lg:px-0 text-4xl lg:text-5xl uppercase">
                        Klaar om <span class="font-bold">actie</span> te ondernemen?
                        <span class="clover-chess"></span>
                    </h2>
                    <p class="text-base lg:text-lg mb-2 px-4 lg:px-0">
                        Wacht niet langer om je doelen te bereiken. Het pad naar jouw succes begint hier. Neem vandaag nog de eerste stap en ontdek jouw potentieel.
                    </p>
                    <p class="text-base lg:text-lg mb-8 lg:mb-16 px-4 lg:px-0">
                        Sluit je aan bij The System en maak van jouw dromen werkelijkheid.
                    </p>
                    <a
                        href="/kennis-maken"
                        class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 mx-4 lg:mx-0 hover:bg-gray-800 text-lg lg:text-xl">
                        Begin nu jouw reis!
                    </a>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 h-full text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Jouw verhaal, jouw kracht</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Je voelt je alleen. Ongezien. Alsof niemand jou echt begrijpt.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        The System is er voor mensen die vastzitten, het niet meer weten, of bijna opgeven.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Geen masker. Geen oordeel. Alleen een plek waar je écht jezelf mag zijn.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Sluit je aan bij onze community. Je hoeft dit niet alleen te doen.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 h-full text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Persoonlijk Mentorschap & Coaching</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Mentorschap van iemand die het zelf overleefde.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Geen theorie, maar structuur, gesprekken en begeleiding die je echt verder brengen.
                    </p>
                    <p class="text-base lg:text-lg mb-2 px-4 lg:px-0">
                        Wat je leert:
                    </p>
                    <ul class="list-disc list-inside mb-6 text-base lg:text-lg px-4 lg:px-0">
                        <li>Discipline opbouwen</li>
                        <li>Je hoofd structureren</li>
                        <li>Obstakels doorbreken</li>
                    </ul>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Wil jij dat echt? Vraag vandaag een gesprek aan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 h-full text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Vertrouwen, Veiligheid & Privacy</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Ik weet dat vertrouwen moeilijk is. Zeker als je vaak gekwetst bent.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Daarom is The System een plek waar je niks hoeft te spelen.
                    </p>
                    <ul class="list-disc list-inside mb-6 text-base lg:text-lg px-4 lg:px-0">
                        <li>Wat je deelt, blijft tussen ons.</li>
                        <li>Geen oordeel. Geen druk.</li>
                        <li>Jij bepaalt wat je vertelt – en wanneer.</li>
                    </ul>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Je bent veilig hier.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Eindelijk een plek waar je mag vallen, en weer op mag staan
                    </p>
                </div>
            </div>
        </div>

        <!-- BText Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 h-full text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Blijf geïnspireerd</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Soms heb je alleen maar één zin nodig om niet op te geven.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Daarom deel ik elke dag iets dat raakt, of jou wakker schudt.
                    </p>
                    <p class="text-base lg:text-lg mb-6 mt-12 px-4 lg:px-0">
                        Volg The System op TikTok & Instagram en word lid van onze Discord community.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Bouw. Groei. Val. Sta op. Samen.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Quote Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
                        De <span class="font-bold">keuze</span> is aan jou. Blijf hangen, of bouw je leven?
                        <span class="clover-chess"></span>
                    </h2>
                    <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System. Geen onzin. <span class="block lg:inline"> Alleen resultaat.</span><br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p>
                </div>

            </div>
        </div>


    </div>
</div>

@endsection