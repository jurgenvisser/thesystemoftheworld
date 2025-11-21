@extends('layouts.app')

@section('title', 'Coaching') <!-- Set the title for this page --> 

@section('content')

<x-standard-hero 
    label="Het Protocol"
    title="Coaching" 
    subtitle="Mentaal onderhoud is geen keuze. Het is je maandelijkse overleving. Je onderhoudt je huis, waarom niet je hoofd?"
    background="bg-v-backdrop-8 lg:bg-h-backdrop-3"
/>

<!-- Main Content Section -->
<section id="proces" class="px-12 py-20 md:py-32 bg-zinc-950">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-colorLight mb-4">HET 3-FASEN SYSTEEM</h2>
            <p class="text-zinc-500 text-lg">Drie stappen van chaos naar controle.</p>
        </div>
        
        <div class="relative flex flex-col gap-12 lg:gap-0 lg:flex-row justify-between">
            
            {{-- Stap 1 --}}
            <div class="lg:w-1/3 p-6 md:p-10 border border-zinc-800 bg-zinc-900/40 relative z-10">
                <div class="w-16 h-16 rounded-full bg-colorPrimary text-black flex items-center justify-center font-black text-2xl mb-6 mx-auto lg:mx-0">
                    1
                </div>
                <h3 class="text-2xl font-mono text-colorPrimary mb-4 uppercase tracking-wider text-center lg:text-left">Aanmelding</h3>
                <p class="text-zinc-400 leading-relaxed mb-6 text-center lg:text-left">
                    We starten met een korte intake om te kijken waar je nu staat en wat je wilt bereiken.
                </p>
                <ul class="space-y-2 text-zinc-300 font-mono text-sm text-left">
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Intake formulier</span>
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">30 min. 1-op-1</span> (geen kosten)
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Nul-meting van discipline</span>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Divider --}}
            <div class="hidden lg:flex items-center justify-center w-[10%] relative text-colorPrimary">
                <div class="absolute w-full h-0.5 bg-zinc-700"></div>
                <x-lucide-move-right class="w-8 h-8 rotate-90 lg:rotate-0 text-colorPrimary" />
            </div>

            {{-- Stap 2 --}}
            <div class="lg:w-1/3 p-6 md:p-10 border border-zinc-800 bg-zinc-900/40 relative z-10">
                <div class="w-16 h-16 rounded-full bg-colorPrimary text-black flex items-center justify-center font-black text-2xl mb-6 mx-auto lg:mx-0">
                    2
                </div>
                <h3 class="text-2xl font-mono text-colorPrimary mb-4 uppercase tracking-wider text-center lg:text-left">Het plan</h3>
                <p class="text-zinc-400 leading-relaxed mb-6 text-center lg:text-left">
                    We bouwen een persoonlijk systeem dat werkt voor jou en jouw uitdagingen.
                </p>
                <ul class="space-y-2 text-zinc-300 font-mono text-sm text-left">
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Blueprint-modules</span> – mentale onderhoud, opdrachten en uitdagingen afgestemd op jou
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Persoonlijke weekplanning & routines</span> – structuur en focus in je dagelijks leven
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Wekelijkse 1-op-1 sessie (optioneel)</span> – extra coaching als je merkt dat je het nodig hebt
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Divider --}}
            <div class="hidden lg:flex items-center justify-center w-[10%] relative text-colorPrimary">
                <div class="absolute w-full h-0.5 bg-zinc-700"></div>
                <x-lucide-move-right class="w-8 h-8 rotate-90 lg:rotate-0 text-colorPrimary" />
            </div>
            
            {{-- Stap 3 --}}
            <div class="lg:w-1/3 p-6 md:p-10 border border-zinc-800 bg-zinc-900/40 relative z-10">
                <div class="w-16 h-16 rounded-full bg-colorPrimary text-black flex items-center justify-center font-black text-2xl mb-6 mx-auto lg:mx-0">
                    3
                </div>
                <h3 class="text-2xl font-mono text-colorPrimary mb-4 uppercase tracking-wider text-center lg:text-left">Resultaat</h3>
                <p class="text-zinc-400 leading-relaxed mb-6 text-center lg:text-left">
                    Dit is je maandelijkse mentale onderhoud. Hier pas je het systeem toe en zie je echt resultaat.
                </p>
                <ul class="space-y-2 text-zinc-300 font-mono text-sm text-left">
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Angsten overwonnen</span> – je oude blokkades verdwijnen stap voor stap
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Discipline vanzelfsprekend</span> – routines zijn onderdeel van je dagelijks leven
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Zelfstandiger en gefocust</span> – je weet wat je moet doen en hoe je vooruitkomt
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Mentale kracht en veerkracht</span> – je blijft sterk, ook onder druk
                        </div>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                        <div class="flex-1">
                            <span class="font-bold">Hulp wanneer nodig</span> – altijd support beschikbaar
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>


{{-- Mentorschap Section --}}
<section id="mentorschap" class="relative bg-colorPrimary/10 px-12 py-24 md:py-32 border-t border-b border-zinc-800 overflow-hidden">
        {{-- Background accent --}}
    <div class="absolute top-0 right-0 w-1/2 h-full bg-colorPrimary/5 -skew-x-12 transform translate-x-1/4 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center relative z-10">
        <div>
            <div class="font-mono text-colorPrimary text-sm uppercase tracking-widest mb-4">Persoonlijk Traject</div>
            <h2 class="text-4xl md:text-5xl font-bold text-colorLight mb-8 leading-tight">
                MENTORSCHAP VAN IEMAND DIE HET <span class="text-colorPrimary">ZELF OVERLEEFDE</span>.
            </h2>
            <p class="text-lg text-zinc-300 mb-6">
                Geen droge theorie, maar concrete structuur, echte gesprekken en begeleiding die je daadwerkelijk vooruit helpen.
            </p>
            <ul class="space-y-4 mb-10 font-mono text-sm text-zinc-400">
                <li class="flex items-center gap-3"><span class="text-colorPrimary"><x-lucide-chevron-right class="h-6 w-6 text-colorPrimary" /></span> Geen oordeel over je verleden</li>
                <li class="flex items-center gap-3"><span class="text-colorPrimary"><x-lucide-chevron-right class="h-6 w-6 text-colorPrimary" /></span> 1-op-1 gesprekken & begeleiding</li>
                <li class="flex items-center gap-3"><span class="text-colorPrimary"><x-lucide-chevron-right class="h-6 w-6 text-colorPrimary" /></span> Focus op herstel en groei</li>
            </ul>
            <a href="{{ $brevoFormLink }}" class="inline-block px-8 py-4 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/80 transition-all">
                Laat je gegevens achter
            </a>
        </div>
        
        <div class="relative">
            <div class="border-4 border-zinc-700 hover:border-colorPrimary transition-all duration-700">
                <img 
                    src="{{ asset('images/TheSystemProfilePicture.jpeg') }}" 
                    alt="Quinn de coach van The System" 
                    class="w-full h-auto grayscale hover:grayscale-0 transition-all duration-700"
                />
            </div>
            <div class="absolute -bottom-6 -left-6 bg-black border border-colorPrimary p-6 max-w-xs">
                <p class="text-colorLight font-bold text-lg">"Ik vertel je niet wat je moet doen. Ik laat je zien wat werkt"</p>
                <p class="text-zinc-500 text-sm mt-1">- Quinn</p>
            </div>
        </div>
    </div>
</section>


{{-- CTA / Contact --}}
<section id="cta" class="px-6 py-20 bg-black border-t border-b border-zinc-800">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-colorLight mb-6">KLAAR OM TE BEGINNEN?</h2>
        <p class="text-zinc-500 text-lg mb-8">Als jij via de knop hierboven al jouw gegevens hebt achtergelaten, plan dan nu jouw kennismaking om jou start te versnellen!</p>
        <a href="https://cal.com/thesystem/kennismaking-met-quinn" class="inline-block px-10 py-5 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/80 transition-all shadow-xl shadow-colorPrimary/30">
            Plan jouw kennismaking nu
        </a>
    </div>
</section>

@endsection



<!-- Main Content Section -->
{{-- <div class="bg-black/0 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
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
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
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
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
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
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">De pijn waar je tegenaan loopt</h2>
                <ul class="list-disc list-outside ml-5 mb-4 text-base lg:text-lg px-4 lg:px-0">
                    <li><span class="font-bold">Chaos in je hoofd</span>: je gedachten racen, je voelt je overweldigd en weet niet waar te beginnen.</li>
                    <li><span class="font-bold">Geen energie, geen focus</span>: je sleept jezelf door de dagen zonder grip of richting.</li>
                    <li><span class="font-bold">Uitstel en twijfel</span>: je wil iets veranderen, maar je blijft hangen in excuses.</li>
                    <li><span class="font-bold">Mentale strijd alleen doorstaan</span>: niemand begrijpt echt wat er in je hoofd gebeurd.</li>
                    <li><span class="font-bold">Angst en onzekerheid</span>: relaties, school, werk of sociale druk verlammen je.</li>
                    <li><span class="font-bold">Stress en burn-out</span>: je voelt dat het je opcolorPrimaryt, maar je weet niet hoe te stoppen.</li>
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
</div> --}}

