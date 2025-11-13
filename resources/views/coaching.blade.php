@extends('layouts.app')

@section('title', 'Coaching') <!-- Set the title for this page --> 

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times">Coaching</h1>
                <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times text-balance text-center hidden lg:block">jouw eerste stap begint hier</h2>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Waarom je hier bent</h2>
                <p class="text-base lg:text-lg">Je bent hier omdat je voelt dat het niet langer zo kan.</p>
                <p class="text-base lg:text-lg mb-4">Je hoofd is vol. Je richting is weg. Je weet dat er meer in je zit maar je komt er niet alleen uit.</p>
                <p class="text-base lg:text-lg">Dat is geen zwakte.</p>
                <p class="text-base lg:text-lg mb-4">Dat is een signaal dat je een systeem nodig hebt dat werkt.</p>
                <p class="text-base lg:text-lg">The System Coaching geeft je geen motivatiepraat.</p>
                <p class="text-base lg:text-lg mb-4">We geven je rust, structuur en iemand die naast je staat tot jij weer vooruit beweegt.</p>
                <p class="text-base lg:text-lg">Geen druk. Geen verplichtingen.</p>
                <p class="text-base lg:text-lg">Alleen de eerste stap naar een leven dat wél klopt.</p>
            </div>
        </div>
        
        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Dit is waar je begint</h2>
                <p class="text-base lg:text-lg mb-4">
                    Als je echt wilt veranderen, begint het hier klein, simpel, maar eerlijk.
                </p>
                <p class="text-base lg:text-lg mb-4">
                    Stel je vragen zonder filters.
                </p>
                <p class="text-base lg:text-lg mb-4">
                    Krijg duidelijke uitleg over wat jij nodig hebt.
                </p>
                <p class="text-base lg:text-lg">
                    Geen verplichting. Geen zorgplan. Geen deadlines.
                </p>
                <p class="text-base lg:text-lg">
                    Alleen de eerste beweging.
                </p>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Kies je eigen weg naar mentale kracht</h2>
                <p class="text-base lg:text-lg mb-4">
                    Bij The System krijg je begeleiding die past bij jouw situatie.
                </p>
                <p class="text-base lg:text-lg mb-4">
                    Onze pakketten (Basis, Groei, Elite) combineren community, coaching en modules om je stap voor stap sterker te maken.
                </p>
                <p class="text-base lg:text-lg mb-4">
                    Laat je gegevens achter en wij benaderen je persoonlijk.
                </p>
                <div class="mt-2">
                    <a href="https://cal.com/thesystem/kennismaking-met-quinn" class="text-base lg:text-lg bg-black text-colorLight rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800"">Plan een afspraak in de agenda</a>
                </div>
            </div>
        </div>
        
        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">De pijn waar je tegenaan loopt</h2>
                <ul class="list-disc list-outside ml-5 mb-4 text-base lg:text-lg px-4 lg:px-0">
                    <li><span class="font-bold">Chaos in je hoofd</span>: je gedachten racen, je voelt je overweldigd en weet niet waar te beginnen.</li>
                    <li><span class="font-bold">Geen energie, geen focus</span>: je sleept jezelf door de dagen zonder grip of richting.</li>
                    <li><span class="font-bold">Uitstel en twijfel</span>: je wil iets veranderen, maar je blijft hangen in excuses.</li>
                    <li><span class="font-bold">Mentale strijd alleen doorstaan</span>: niemand begrijpt echt wat er in je hoofd gebeurd.</li>
                    <li><span class="font-bold">Angst en onzekerheid</span>: relaties, school, werk of sociale druk verlammen je.</li>
                    <li><span class="font-bold">Stress en burn-out</span>: je voelt dat het je opbrandt, maar je weet niet hoe te stoppen.</li>
                </ul>

                <p class="text-base lg:text-lg mb-4 font-bold">                    
                    Stop hiermee.
                </p>
                <p class="text-base lg:text-lg mb-4">                    
                    The System geeft je <span class="font-bold">structuur, coaching en een blueprint</span> waarmee je stap voor stap uit deze chaos komt.
                </p>
                <p class="text-base lg:text-lg mb-4">                    
                    Je leert <span class="font-bold">focus, discipline en mentale kracht</span> niet tijdelijk, maar blijvend.
                </p>
            </div>
        </div>

        <!-- Video Section (3/6) -->
        <div class="bg-colorPrimary/60 relative h-[60vh] lg:h-full col-span-3 flex">
            <!-- Fallback Text -->
            <div class="absolute inset-0 flex items-center justify-center z-0 pointer-events-none">
                <div class="text-colorLight text-center">
                    <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Bekijk hier de video</h2>
                    <p class="text-base lg:text-lg mb-6">                    
                        Klik hier om de video om te bekijken.
                    </p>
                </div>
            </div>

            <!-- Video -->
            <video 
                src="/videos/MotivationalVideo.mov" 
                class="absolute inset-0 w-full h-full object-cover z-10" 
                loop 
                playsinline 
                controls>
                Your browser does not support the video tag.
            </video>
        </div>

    </div>
</div>

@endsection