@extends('layouts.app')

@section('title', 'Social Media')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-5 lg:bg-h-backdrop-2 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Social Media</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Social Media</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Welkom op onze Social Media pagina! Hier vind je links naar al onze platformen waar The System actief is. Onze sociale media zijn meer dan gewoon content; ze zijn een plek waar we samenkomen als community, elkaar ondersteunen en inspireren.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Klik op de knoppen hieronder om deel uit te maken van onze beweging en te blijven groeien, leren en doorzetten met The System.
                    </p>
                    <div class="flex space-x-4 justify-center lg:justify-start w-full">
                        <a href="https://music.apple.com/us/artist/juri/1777135807" class="w-12 lg:w-16 h-12 lg:h-16 bg-instagram-white bg-cover rounded-lg flex items-center justify-center">
                            <!-- Apple Music Icon -->
                        </a>
                        <a href="https://open.spotify.com/artist/6V5305M5J7Z8UXD9EVWMYj?si=acNfjgalRMON76ndy7xlOA" class="w-12 lg:w-16 h-12 lg:h-16 bg-threads-white bg-cover rounded-lg flex items-center justify-center">
                            <!-- Spotify Icon -->
                        </a>
                        <a href="https://www.youtube.com/@JURI-Bloom" class="w-12 lg:w-16 h-12 lg:h-16 bg-x-white bg-contain bg-center bg-no-repeat rounded-lg flex items-center justify-center">
                            <!-- YouTube Icon -->
                        </a>
                        <a href="https://music.youtube.com/channel/UCpS0XdY_5L7IE7AOUEWaAyg" class="w-12 lg:w-16 h-12 lg:h-16 bg-facebook-white bg-cover rounded-lg flex items-center justify-center">
                            <!-- YouTube Music Icon -->
                        </a>
                    </div>
                </div>

            </div>
        </div>

        
    </div>
</div>

@endsection