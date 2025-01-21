@extends('layouts.app')

@section('title', 'Toekomst')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                <h1 class="text-5xl font-bold uppercase font-times mb-8">Toekomst</h1>

                <!-- Text below the title -->
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    De toekomst is voor degenen die durven te dromen en het lef hebben om die dromen werkelijkheid te maken. Bij The System kijken we vooruit – altijd zoekend naar manieren om te groeien, innoveren en de wereld te verbeteren.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    De toekomst van The System gaat verder dan technologie en producten. Het gaat om het bouwen van een gemeenschap die samenwerkt om een betere wereld te creëren.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Blijf ons volgen voor de spannende dingen die nog komen gaan.
                </p>

                <!-- Extra space between the text and the follow text -->
                <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                    Volg The System voor meer! <br>
                    TikTok: @thesystemoftheworld.
                </p>
            </div>

        </div>
    </div>
</div>

@endsection