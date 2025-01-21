@extends('layouts.app')

@section('title', 'Merchandise')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                <h1 class="text-5xl font-bold uppercase font-times mb-8">Merchandise</h1>

                <!-- Text below the title -->
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Onze merchandise is niet alleen een product, het is een statement. Het is voor de mensen die niet bang zijn om zichzelf uit te drukken en die trots zijn op hun reis.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Met The System merchandise draag je niet alleen iets fysieks, je draagt een boodschap van kracht, doorzettingsvermogen en ambitie.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Blijf op de hoogte voor onze nieuwste producten en exclusieve releases!
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