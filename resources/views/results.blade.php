@extends('layouts.app')

@section('title', 'Resultaten')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<x-standard-hero 
    label="Degene die doet"
    title="The System Members" 
    subtitle="Lees van de Members wat zij hebben bereikt met The System en hoe hun leven is veranderd."
    background="bg-v-backdrop-5 lg:bg-h-backdrop-2"
/>

@include('components.reviews.average')
@include('components.reviews.list')

{{-- . Voor een individuele review gebruik het onderstaande --}}
{{-- @include('components.reviews.card', ['review' => $reviews[0], 'index' => 0, 'shown' => 1]) --}}

<!-- PERSUASIVE CONTENT / EXTRA INFORMATIE -->
<section class="py-24 px-6 border-t border-zinc-900 bg-zinc-950">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">
        
        <div class="space-y-8">
            <span class="font-mono text-xs uppercase tracking-widest text-colorPrimary border-b border-colorPrimary pb-2">Het Verschil</span>
            <h2 class="text-4xl font-black text-colorLight uppercase leading-tight">
                Waarom deze mensen <span class="text-colorPrimary">winnen</span>.
            </h2>
            <p class="text-zinc-400 text-lg">
                De reviews hierboven hebben één ding gemeen: het zijn geen mensen die "hoopten" op verandering. Het zijn mensen die een systeem hebben geïmplementeerd. 
            </p>
            <ul class="space-y-4 text-zinc-300 font-mono text-sm">
                <li class="flex items-center gap-3">
                    <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" /> 100% Eerlijke reviews van onze leden
                </li>
                <li class="flex items-center gap-3">
                    <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" /> Geen Influencer Marketing
                </li>
                <li class="flex items-center gap-3">
                    <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" /> Resultaat-gedreven Feedback
                </li>
            </ul>
        </div>

        <div class="p-8 border border-colorPrimary/30 bg-black/50 relative">
            <div class="absolute -top-3 -right-3 w-6 h-6 bg-colorPrimary"></div>
            <h3 class="text-2xl font-bold text-colorLight mb-4 uppercase">The System Garantie</h3>
            <p class="text-zinc-400 mb-6">
                Wil je ook zulke resultaten behalen? Je hoofd verandert niet door hoop. Het verandert door onderhoud, herhaling en begeleiding. Dat is wat je hier krijgt.
            </p>
            <a href="/mentorschap" class="inline-block w-full text-center px-8 py-4 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/80 transition-all">
                Begin Jouw Reis
            </a>
        </div>

    </div>
</section>

@endsection