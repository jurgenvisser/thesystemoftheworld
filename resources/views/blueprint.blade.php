@extends('layouts.app')

@section('title', 'Blueprint')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->

<x-standard-hero 
    label="De fundering"
    title="Jouw Blueprint" 
    subtitle="Zelf-coaching, stap voor stap, blijvend effect. Permanente Oplossingen voor jouw Pijnpunten."
    background="bg-v-backdrop-7 lg:bg-h-backdrop-1"
    theme="Secondary"
    forceSecondary="true"
/>

<!-- SECTIE: WAAROM DE BLUEPRINT (FUNCTIONELE KERNWAARDE) -->
<section id="waarom" class="px-6 py-20 md:py-32 bg-black">
    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-12 items-start">
        
        <div class="md:col-span-1 space-y-4">
            <span data-theme-fixed class="font-mono text-xs uppercase tracking-widest text-colorSecondary border-b border-colorSecondary pb-2">HET PRINCIPE</span>
            <h2 class="text-3xl text-colorLight">
                ALLEEN ACTIE. GEEN WACHTTIJD.
            </h2>
        </div>

        <div class="md:col-span-2 space-y-6">
            <p class="text-zinc-400 text-lg">
                De Blueprint-modules pakken jouw blokkades één voor één aan. Een stap-voor-stap handleiding die je op je eigen tempo volgt.
            </p>
            <ul class="space-y-3 text-zinc-300 font-mono text-sm">
                <li class="flex items-start gap-2"><x-lucide-check data-theme-fixed class="h-6 w-6 text-colorSecondary" /> DIRECTE TOEGANG: Start vandaag nog.</li>
                <li class="flex items-start gap-2"><x-lucide-check data-theme-fixed class="h-6 w-6 text-colorSecondary" /> 100% ZELFCOACHING: Werk op jouw eigen tempo.</li>
                <li class="flex items-start gap-2"><x-lucide-check data-theme-fixed class="h-6 w-6 text-colorSecondary" /> FOCUS OP RESULTAAT: Praktische, uitvoerbare stappen.</li>
            </ul>
        </div>
    </div>
</section>


<!-- SECTIE: DE MODULES (MINIMALISTISCHE KAARTEN) -->
<section id="modules" class="px-6 py-20 md:py-32 bg-zinc-950 border-t border-zinc-800">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-colorLight mb-4">DE OPERATIONELE MODULES</h2>
            <p class="text-zinc-500 text-lg">Kies je pijnpunt. Start de oplossing.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
            <!-- MODULE 1: EXECUTION/DISCIPLINE -->
            {{-- Toegevoegd: glow-card, relative, data-glow-theme="secondary" --}}
            <div class="glow-card relative rounded-xl p-8 transition-all duration-300" data-glow-theme="secondary">
                
                <div class="glow-blob"></div>

                <div class="glow-content">
                    <span data-theme-fixed class="font-mono text-xs uppercase tracking-widest text-colorSecondary block mb-4">Blueprint 01</span>
                    <h3 class="text-3xl font-bold text-colorLight mb-4 uppercase">Gezonde gedachten</h3>
                    <p class="text-zinc-400 mb-6">
                        Het stappenplan om uitstelgedrag en mentale blokkades te stoppen.
                    </p>
                    <ul class="space-y-2 text-zinc-300 font-mono text-sm uppercase">
                        <li>— Pijn: Chroninsch uitstellen</li>
                        <li>— Focus: Direct actie nemen</li>
                        <li>— Duur: 7 dagen zelf-handleiding</li>
                    </ul>
                    <a href="#cta" data-theme-fixed class="mt-6 inline-block font-mono text-colorSecondary text-sm hover:text-colorLight transition-colors">
                        Ontgrendelt Blueprint 02 - Emoties
                    </a>
                </div>
            </div>

            <!-- MODULE 2: DEEP WORK/FOCUS -->
            {{-- Toegevoegd: glow-card, relative, data-glow-theme="secondary" --}}
            <div class="glow-card relative rounded-xl p-8 transition-all duration-300" data-glow-theme="secondary">
                
                <div class="glow-blob"></div>

                <div class="glow-content">
                    <span data-theme-fixed class="font-mono text-xs uppercase tracking-widest text-colorSecondary block mb-4">Blueprint 02</span>
                    <h3 class="text-3xl font-bold text-colorLight mb-4 uppercase">Emoties</h3>
                    <p class="text-zinc-400 mb-6">
                        Het stappenplan om emoties te herkennen, accepteren en bewust te sturen.
                    </p>
                    <ul class="space-y-2 text-zinc-300 font-mono text-sm uppercase">
                        <li>— Pijn: Onbewuste emoties die je beïnvloeden</li>
                        <li>— Focus: Bewust reageren op gevoelens</li>
                        <li>— Duur: 14 dagen zelf-handleiding</li>
                    </ul>
                    <a href="#cta" data-theme-fixed class="mt-6 inline-block font-mono text-colorSecondary text-sm hover:text-colorLight transition-colors">
                        Ontgrendelt Blueprint 03 - Angst & Onzekerheid
                    </a>
                </div>
            </div>
            
            <!-- MODULE 3: ENERGY/BIO-OPTIMALISATIE -->
            {{-- Toegevoegd: glow-card, relative, data-glow-theme="secondary" --}}
            <div class="glow-card relative rounded-xl p-8 transition-all duration-300" data-glow-theme="secondary">
                
                <div class="glow-blob"></div>

                <div class="glow-content">
                    <span data-theme-fixed class="font-mono text-xs uppercase tracking-widest text-colorSecondary block mb-4">Blueprint 03</span>
                    <h3 class="text-3xl font-bold text-colorLight mb-4 uppercase">Angst & Onzekerheid</h3>
                    <p class="text-zinc-400 mb-6">
                        Beheers angst en onzekerheid. Krijg controle en bouw dagelijks zelfvertrouwen op.
                    </p>
                    <ul class="space-y-2 text-zinc-300 font-mono text-sm uppercase">
                        <li>— Pijn: Angst, twijfel en vastzitten</li>
                        <li>— Focus: Patronen doorbreken, mentale kracht opbouwen</li>
                        <li>— Duur: 21 dagen zelf-handleiding</li>
                    </ul>
                    <a href="#cta" data-theme-fixed class="mt-6 inline-block font-mono text-colorSecondary text-sm hover:text-colorLight transition-colors">
                        Word lid voor nog 30+ andere Blueprints!
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

 <!-- CTA / Contact -->
<section id="cta" class="px-6 py-20 bg-black border-t border-zinc-800">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-colorLight mb-6">Vragen over Blueprint?</h2>
        <p class="text-zinc-500 text-lg mb-8">Heb je een vraag of wil je weten of er een Blueprint is voor jou specifieke pijnpunt? Stel ons dan een vraag via WhatsApp!</p>
        <a href="https://wa.me/31645603530" data-theme-fixed class="inline-block px-10 py-5 font-mono text-sm uppercase bg-colorSecondary text-black font-bold hover:bg-colorSecondary/80 transition-all shadow-xl shadow-colorSecondary/30">
            <div class="flex items-center gap-4">
                <span class="h-6 aspect-[1/1] bg-whatsapp-black bg-cover bg-center block"></span>
                <span class="font-mono text-black uppercase tracking-widest w-full">Chat met ons</span>
            </div>
        </a>
</section>

@endsection