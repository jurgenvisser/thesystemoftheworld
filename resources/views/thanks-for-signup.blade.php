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
            <h1 class="text-3xl md:text-8xl font-black font-times text-colorLight mb-6 uppercase">Bedankt voor je aanmelding!</h1>
            <!-- Subtitle with top border -->
            <p class="text-md md:text-xl text-colorLight font-light max-w-2xl mx-auto border-t-2 border-colorPrimary pt-4">
                Je bent nu onderdeel van The System.
            </p>
            <p class="text-md md:text-xl text-colorLight font-light max-w-2xl mx-auto mt-4">
                Dit is een plek waar mensen werken aan rust, helderheid en structuur in hun eigen tempo.
                Je hoeft niets voor te bereiden en je kan vandaag beginnen. 
            </p>
            <p class="text-md md:text-xl text-colorLight font-light max-w-2xl mx-auto mt-4">
                Via de knop hieronder krijg je toegang tot de community.
                Kijk eerst rustig rond. En begin gelijk aan jou herstel.
            </p>
            <div class="flex flex-col gap-3 pt-10 justify-center lg:px-48">
                <a href="{{ $discordPassJoinLink }}" class="px-8 lg:px-10 py-5 font-mono w-full text-sm uppercase bg-blurple font-bold hover:bg-blurple/80 transition-all shadow-xl shadow-blurple/30">
                    <div class="flex items-center gap-2 md:gap-5 justify-between md:justify-center">
                        <span class="h-6 aspect-[1/1] bg-discord-white bg-cover bg-center block"></span>
                        <span class="font-mono text-white uppercase tracking-widest">Discord Community</span>
                    </div>
                </a>
                {{-- <a href="/" class="px-5 py-5 font-mono w-full text-sm uppercase bg-colorPrimary font-bold hover:bg-colorPrimary/80 transition-all shadow-xl shadow-colorPrimary/30">
                    <div class="flex items-center gap-2 md:gap-4 justify-between md:justify-center">
                        <x-lucide-house class="h-6 aspect-[1/1]" /></span>
                        <span class="font-mono text-black uppercase tracking-widest">Ga naar de Homepage</span>
                    </div>
                </a> --}}
            </div>
        </div>
    </div>
</section>

@endsection