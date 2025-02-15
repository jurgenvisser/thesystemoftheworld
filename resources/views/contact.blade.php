@extends('layouts.app')

@section('title', 'Contact')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0"> {{-- todo: add a fifth backdrop and set it here --}}
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
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
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Team The System</h1>
                
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


        <!-- Second Section (4/6) -->
        <div class="h-auto lg:h-full col-span-4 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Introductie</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        We begrijpen dat je hier bent omdat je iets zoekt. Een antwoord, een oplossing, een stap vooruit. En dat is precies wat The System biedt.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Op dit moment zijn we hard bezig met het bouwen van een platform dat jouw leven kan veranderen. Een plek waar je de tools vindt om te groeien, sterker te worden, en jezelf te ontdekken.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Dit wordt een beweging. The System is voor de mensen die willen winnen, die vastberaden zijn om door te breken.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Blijf op de hoogte voor updates en wees de eerste die toegang krijgt tot exclusieve content, producten, en meer!
                    </p>
                    <!-- Space between content and the follow text -->
                    <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System voor meer! <br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p>
                </div>

            </div>
        </div>


         <!-- Third Section (2/6) -->
         <div class="bg-black col-span-2 hidden lg:block h-full">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                <image id="theme-image-contact-logo-full" href="{{ asset('images/logos/TheSystemFull.svg') }}" class="w-full h-full object-cover" />
            </svg>
        </div>

        
    </div>
</div>

{{-- @include('layouts.email-form') --}}
@endsection