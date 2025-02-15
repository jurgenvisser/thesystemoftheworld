@extends('layouts.app')

@section('title', 'Merchandise')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Merchandise</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Merchandise</h1>
    
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
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p>
                </div>

            </div>
        </div>

        
    </div>
</div>

@endsection