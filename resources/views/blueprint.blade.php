@extends('layouts.app')

@section('title', 'Blueprint')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div data-theme-fixed class="bg-colorSecondary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times">Blueprint</h1>
                {{-- <h2 class="text-xl lg:text-2xl lg:text-4xl text-colorLight font-bold uppercase font-times">Jouw Mentale Community</h2> --}}
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div data-theme-fixed class="bg-colorSecondary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Image Section (2/6) -->
        <div class="relative bg-black col-span-2 hidden lg:block h-full overflow-hidden">
            <!-- Blurred Background -->
            <img src="{{ asset('images/logos/BlueprintFull.svg') }}" 
                 alt="The System Blueprint Background"
                 class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-50 scale-110">
            
            <!-- Main Square Image -->
            <div class="absolute inset-0 flex justify-center items-center">
                <img src="{{ asset('images/logos/BlueprintFull.svg') }}" 
                     alt="The System Blueprint Main" 
                     class="object-cover aspect-square max-h-[100%] max-w-[100%] shadow-2xl">
            </div>
        </div>

        <!-- First Section (4/6) -->
        <div class="h-auto lg:h-full col-span-4">
            <div data-theme-fixed class="bg-colorSecondary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-center text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Jouw Mentale Community</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        <span class="font-bold">The System Blueprint</span> is een community van gelijkgestemde mensen die werken aan mentale kracht, focus en persoonlijke groei. Hier maak je vrienden die hetzelfde willen bereiken en elkaar vooruit helpen.
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        <span class="font-bold">Volledige toegang tot The System Blueprint</span>: 36 modules, stap voor stap mentale skills leren
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        <span class="font-bold">Persoonlijke begeleiding</span>: coaching en mentorschap van mensen die het zelf hebben doorleefd
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        <span class="font-bold">Community support</span>: feedback, challenges en toezicht binnen een actieve groep
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        <span class="font-bold">Uniek leerplatform</span>: alles is digitaal, praktisch en direct toepasbaar
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bouw discipline. Vergroot je mentale kracht. Word onderdeel van een beweging die levens verandert.
                    </p>
                    <a
                        href="{{ $brevoFormLink }}"
                        data-theme-fixed
                        class="bg-black text-colorLight rounded hover:ring hover:ring-colorSecondary py-3 px-6 mx-4 lg:mx-0 hover:bg-gray-800 text-lg lg:text-xl">
                        Word lid van The System
                    </a>
                </div>

            </div>
        </div>

        <!-- First Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div data-theme-fixed class="bg-colorSecondary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Stap-voor-Stap Blueprint</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Leer de vaardigheden die echt werken mentale kracht, focus en discipline
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Modern leerplatform alles praktisch, digitaal en direct toepasbaar
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Gemakkelijk te volgen programma duidelijk, modulair en stap voor stap
                    </p>
                </div>

            </div>
        </div>

        <!-- First Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div data-theme-fixed class="bg-colorSecondary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Privé Netwerk & Community</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Omring jezelf met gelijkgestemden mensen die net als jij willen groeien en sterker worden
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Leer van concerten ervaringen echte resultaten, echte uitdagingen, echte oplossingen
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Vier je overwinningen samen een community die je begrijpt en vooruit helpt
                    </p>
                </div>

            </div>
        </div>

        <!-- First Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div data-theme-fixed class="bg-colorSecondary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Persoonlijk Mentorschap</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Een plan dat werkt voor jou persoonlijk afgestemd op jouw mentale groei en doelen
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Begeleiding van ervaren mentors mensen die het zelf hebben doorleefd
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Direct toepasbare adviezen concrete stappen die je vooruit helpen
                    </p>
                </div>

            </div>
        </div>

        <!-- First Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div data-theme-fixed class="bg-colorSecondary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Wat je leert bij The System?</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Gedachten & Emoties rust, focus en zelfvertrouwen
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Discipline & Structuur routines, verantwoordelijkheid en momentum
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Stress & Mentale Rust – omgaan met druk, burn-out en moeilijke dagen
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Relaties & Sociale Kracht sociale vaardigheden, zelfreflectie en vergeving
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Persoonlijke Groei & Overwinning challenges, doorzettingsvermogen en mentale skills
                    </p>
                </div>
                
            </div>
        </div>
        
        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div data-theme-fixed class="bg-colorSecondary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Wat staat je te wachten?</h1>
    
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Tijd is kostbaar. Wie echt vooruit wil, moet investeren in de juiste begeleiding en omgeving. 
                        Met The System krijg je support, structuur en directe toepassing van alles wat je leert.
                    </p>
                    <p class="text-base lg:text-lg mb-0 px-4 lg:px-0">
                        Mentorschap van experts: coaches die het zelf hebben doorleefd en weten wat écht werkt
                    </p>
                    <p class="text-base lg:text-lg mb-0 px-4 lg:px-0">
                        Persoonlijk afgestemd: aanbevelingen en oefeningen afgestemd op jouw situatie en doelen
                    </p>
                    <p class="text-base lg:text-lg mb-0 px-4 lg:px-0">
                        Praktische groei: leer mentale skills die je nu én voor de rest van je leven vasthoudt
                    </p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                        Support en community: een omgeving die je uitdaagt, begeleidt en vooruit helpt
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Bouw discipline. Vergroot je mentale kracht. Word mentaal onverslaanbaar met The System.
                    </p>
                </div>
                
            </div>
        </div>
        
        <!-- Quote Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div data-theme-fixed class="bg-colorSecondary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-start text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <h2 class="mb-4 px-4 lg:px-0 text-2xl lg:text-2xl lg:text-4xl uppercase">
                    Onze System-leden winnen <span class="font-bold">elke dag</span>.
                    <span class="clover-chess"></span>
                </h2>
                <p class="text-base lg:text-lg mt-4 px-4 lg:px-0">
                    Resultaten komen door focus, begeleiding en de juiste omgeving.
                    {{-- TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>. --}}
                </p>

            </div>
        </div>

        
    </div>
</div>

@endsection