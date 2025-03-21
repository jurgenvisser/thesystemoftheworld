@extends('layouts.app')

@section('title', 'Contact')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0"> {{-- todo: add a fifth backdrop and set it here --}}
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Contact</h1>
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
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Team The System</h1>
                
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Het team van The System bestaat uit een diverse groep mensen die allemaal gedreven worden door dezelfde passie: het creëren van een impactvolle en vooruitstrevende gemeenschap. Elk lid brengt unieke talenten en perspectieven in, waardoor we samen sterker staan.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        We zijn een team van visionairs, innovators en doorzetters, die zich inzetten voor het inspireren van anderen. Onze missie is niet alleen het bouwen van een merk, maar ook het bevorderen van een cultuur van kracht, zelfvertrouwen en authenticiteit.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System geloven we in samenwerking en het omarmen van verschillende ideeën en achtergronden. Samen creëren we een ruimte waar iedereen zich gehoord en gesteund voelt op hun persoonlijke reis.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        We werken voortdurend aan het verbeteren van ons merk en onze boodschap. Blijf op de hoogte van onze nieuwste ontwikkelingen en maak deel uit van onze groeiende gemeenschap.
                    </p>
                    <!-- Extra space between the text and the follow text -->
                    <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System voor meer! <br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p>
                </div>

            </div>
        </div>


         <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Contact The System</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Heb jij vragen, ideeën of wil je direct in contact komen met The System? Dit is geen standaard platform wij zijn hier om actie te ondernemen en verandering te brengen.
                    </p>
                    <p class="text-base lg:text-lg">
                        Gebruik het contactformulier om ons te bereiken. Of je nu vastzit hulp nodig hebt, of simpelweg klaar bent om de volgende stap te zetten wij luisteren.
                    </p>
                </div>

            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">

                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Liever Direct Messaging?</h1>
                    <p class="text-base lg:text-lg mb-6">
                        E-mail niet jouw ding? Geen probleem. The System draait om direct schakelen. Stuur ons een bericht op TikTok, Instagram of Facebook.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Of je nu een vraag hebt, je verhaal wilt delen.
                    </p>
                    <p class="text-base lg:text-lg">
                        We luisteren!
                    </p>
                </div>

            </div>
        </div>

        @include('layouts.email-form')
        
    </div>
</div>

@endsection