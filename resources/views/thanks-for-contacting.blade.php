@extends('layouts.app')

@section('title', 'Bedankt voor je bericht!')  <!-- Set the title for this page --> 

@section('content')

<!-- Hero Content Section -->
<!-- HERO: Bedankt -->
<section class="relative h-[calc(100vh-12rem)] flex flex-col justify-center px-12 border-b border-zinc-800">
    <div class="absolute inset-0 bg-v-backdrop-1 lg:bg-h-backdrop-3 bg-cover bg-center opacity-90 grayscale"></div> <!-- Background Image -->
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-black/40"></div> <!-- Gradient Overlay -->

    <!-- Content Wrapper -->
    <div class="relative max-w-7xl mx-auto w-full z-10">
        <div class="relative max-w-4xl mx-auto text-center">
            <!-- Theme color protocol label -->
            <span class="font-mono text-xs uppercase tracking-widest text-colorPrimary block mb-4">Connectie: Succes</span>
            <!-- Headline -->
            <h1 class="text-5xl md:text-8xl font-black font-times text-colorLight mb-6 uppercase">Bedankt voor je bericht!</h1>
            <!-- Subtitle with top border -->
            <p class="text-xl md:text-2xl text-zinc-400 font-light max-w-2xl mx-auto border-t-2 border-colorPrimary pt-4">
                We zullen zo snel mogelijk contact met je opnemen.
            </p>
            <a href="/" class="inline-block px-10 py-5 mt-10 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/80 transition-all shadow-xl shadow-colorPrimary/30">
            <div class="flex items-center gap-4">
                <x-lucide-house class="h-6 aspect-[1/1]" /></span>
                <span class="font-mono text-black uppercase tracking-widest w-full">Ga terug naar de Homepage</span>
            </div>
        </a>
        </div>
    </div>
</section>

@endsection