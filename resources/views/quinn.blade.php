@extends('layouts.app')

@section('title', 'Community')  <!-- Set the title for this page -->

@section('content')

<!-- HERO: INTRODUCTIE -->
<section class="relative py-32 md:py-44 lg:py-56  px-6 border-b border-zinc-900">
    
    <video id="quinn-video-background" autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover z-[-1]">
        <source src="{{ asset('videos/Quinn_backdrop.mov') }}" type="video/mp4">
        {{-- Fallback tekst voor browsers die de video niet ondersteunen --}}
        <p>Your browser does not support the video tag.</p>
    </video>

    <div class="absolute inset-0 bg-black/50 z-0"></div>

    <div class="max-w-3xl mx-auto text-center relative z-10">
        <span class="font-mono text-xs uppercase tracking-widest text-colorPrimary block mb-6">De Coach</span>
        <h1 class="text-6xl md:text-9xl font-black text-colorLight uppercase tracking-tighter mb-8 leading-none">
            Quinn
        </h1>
        <div class="h-1 w-24 bg-colorPrimary mx-auto"></div>
    </div>
</section>

<!-- HET VERHAAL -->
<section class="py-20 px-6">
    <div class="max-w-2xl mx-auto space-y-24">
        
        <!-- Deel 1 -->
        <div class="space-y-6 animate-on-scroll fade-out-on-leave">
            <p class="text-2xl font-light text-zinc-400 leading-relaxed">
                <span class="text-colorLight font-bold">Ik ben Quinn.</span> Geboren in Den Haag, opgegroeid in Groningen. 
            </p>
            <p class="text-xl text-zinc-500 leading-relaxed">
                Niet met kansen, maar met strijd. Mijn jeugd dwong me om vroeg volwassen te worden om trauma’s te dragen die te zwaar waren, om te overleven in plaats van te leven.
            </p>
        </div>

        <!-- Deel 2 -->
        <div class="border-l-2 border-colorPrimary pl-8 py-2 animate-on-scroll fade-out-on-leave">
            <p class="text-lg text-zinc-300 mb-6">
                Ik heb mezelf jarenlang moeten bewijzen… tegen mezelf.
            </p>
            <ul class="space-y-4 font-mono text-sm text-zinc-400 uppercase tracking-wide">
                <li>Tegen mijn angsten.</li>
                <li>Tegen het verleden dat me klein probeerde te houden.</li>
            </ul>
        </div>

        <!-- Deel 3 -->
        <div class="py-12 text-center animate-on-scroll fade-out-on-leave">
            <p class="text-zinc-500 text-sm font-mono mb-4 uppercase">Maar ik heb nooit opgegeven.</p>
            <h2 class="text-3xl md:text-5xl font-bold text-colorLight leading-tight">
                Op mijn twintigste keek ik mezelf recht aan de echte ik, de gebroken ik en besloot:
            </h2>
            <div class="mt-8 inline-block bg-zinc-900 px-6 py-4 border border-zinc-800">
                <p class="text-colorPrimary font-bold text-xl md:text-2xl">DIT WORDT NIET MIJN EINDE.<br>DIT WORDT MIJN BEGIN.</p>
            </div>
        </div>

        <!-- Deel 4 -->
        <div class="space-y-6 text-lg text-zinc-400 leading-relaxed animate-on-scroll fade-out-on-leave">
            <p>
                Ik heb mijn trauma’s overwonnen, mijn zelfbeeld herbouwd, mijn angsten aangekeken en mijn verleden doorbroken. En dat deed ik met discipline, met wilskracht en met één visie:
            </p>
            <p class="text-colorLight text-xl font-medium border-b border-zinc-800 pb-8">
                Ik ga de persoon worden die ik vroeger nodig had.
            </p>
        </div>

        <!-- Deel 5 -->
        <div class="bg-zinc-900/30 p-8 md:p-12 border border-zinc-800 animate-on-scroll fade-out-on-leave">
            <h3 class="text-3xl font-bold text-colorLight mb-6">DAT IS WAAROM THE SYSTEM BESTAAT.</h3>
            
            <div class="grid gap-4 mb-8">
                <div class="flex items-center gap-4 text-zinc-300">
                    <span class="h-px w-8 bg-zinc-600"></span> Het is een manier van leven.
                </div>
                <div class="flex items-center gap-4 text-zinc-300">
                    <span class="h-px w-8 bg-zinc-600"></span> Het is bescherming.
                </div>
                <div class="flex items-center gap-4 text-zinc-300">
                    <span class="h-px w-8 bg-zinc-600"></span> Het is richting.
                </div>
                <div class="flex items-center gap-4 text-colorLight font-bold">
                    <span class="h-px w-8 bg-colorPrimary"></span> Het is waarheid ongefilterd.
                </div>
            </div>

            <p class="text-lg text-zinc-400 italic mb-6">
                "The System is jouw paraplu. En waarom?"
            </p>
            <p class="text-zinc-300 leading-relaxed">
                Het weer kun je niet controleren storm, regen, chaos maar je kunt wél kiezen hoe je jezelf beschermt. Dit is de les die ik overal meegeef, in mijn werk én in mijn privéleven. <span class="text-colorPrimary">Een les die mijn leven heeft gered.</span>
            </p>
        </div>

        <!-- Deel 6 -->
        <div class="space-y-8 animate-on-scroll fade-out-on-leave">
            <p class="text-xl text-zinc-400 leading-relaxed">
                Ik zal nooit vergeten wie ik ben, wat ik heb gezien, wat ik heb doorstaan.
                En ik zal nooit stoppen met doorgeven wat ik heb geleerd omdat er teveel mensen zijn zoals ik vroeger was. Mensen die denken dat ze alleen zijn.
            </p>
            <p class="text-2xl text-colorLight font-bold">
                Dat zijn ze niet.
            </p>
        </div>

        <!-- Deel 7 -->
        <div class="border-t border-zinc-900 pt-12 animate-on-scroll fade-out-on-leave">
            <p class="text-lg text-zinc-400 mb-8">
                Ik ben hier met een reden. En mensen zullen me nooit vergeten niet om wie ik ben, maar om wat ik heb gebouwd.
                Ook als ik er ooit niet meer ben, blijft The System bestaan.
            </p>
            <div class="flex flex-col md:flex-row gap-8 font-mono text-sm text-colorPrimary uppercase tracking-widest">
                <span>// Als mijn stem</span>
                <span>// Als mijn boodschap</span>
                <span>// Als mijn reden</span>
            </div>
        </div>

    </div>
</section>

<!-- OUTRO -->
<section class="py-32 px-6 bg-black text-center border-t border-zinc-900 animate-on-scroll fade-out-on-leave">
    <div class="max-w-2xl mx-auto animate-on-scroll fade-out-on-leave">
        <h2 class="text-4xl md:text-5xl font-black text-colorLight mb-8">ELKE KEUZE HEEFT CONSEQUENTIES.</h2>
        
        <div class="flex flex-col gap-2 mb-12 text-xl md:text-2xl text-zinc-400 font-light">
            <span>Kies kracht.</span>
            <span>Kies richting.</span>
            <span class="text-colorLight font-bold">Kies jezelf.</span>
        </div>

        <div class="p-6 border border-zinc-800 inline-block bg-zinc-900/50">
            <p class="text-lg text-colorLight font-medium">"Ik ben geboren uit strijd.<br>The System is geboren om die strijd voor anderen te doorbreken."</p>
            <p class="text-colorPrimary font-mono text-xs uppercase mt-4">— Quinn</p>
        </div>
        
        <div class="mt-16 border-t border-zinc-900 pt-12 animate-on-scroll fade-out-on-leave">
            <p class="text-2xl font-light text-zinc-400 leading-relaxed mb-4">
                Wil jij ook de persoon worden die je vroeger nodig had? Neem vandaag nog de eerste stap!
            </p>
            <a href="{{ $brevoFormLink }}" class="inline-block px-10 py-4 border border-white text-colorLight font-mono uppercase text-sm hover:bg-white hover:text-black transition-all duration-300">
                Laat je gegevens achter
            </a>
        </div>
    </div>
</section>

@endsection