@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Homepage</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">
       
        <!-- First Section (2/6) -->
        <div class="bg-black col-span-2 hidden lg:block h-full">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                <image id="theme-image-homepage-logo-full" href="{{ asset('images/logos/TheSystemFull.svg') }}" class="w-full h-full object-cover" />
            </svg>
        </div>

        <!-- Second Section (4/6) -->
        <div class="h-full col-span-4 flex">
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
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Blijf op de hoogte voor updates en wees de eerste die toegang krijgt tot exclusieve content, producten, en meer!
                    </p>
                    <!-- Space between content and the follow text -->
                    {{-- <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System voor meer! <br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p> --}}
                </div>

            </div>
        </div>


        <!-- Third Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
            
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Groei naar succes</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Sta jij stil in het leven? Voelt elke dag hetzelfde, zonder echte vooruitgang? The System is hier om dat te doorbreken.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Dit is geen plek voor excuses. Dit is een beweging voor mensen die écht willen groeien. Mentaal sterker worden, meer discipline opbouwen en eindelijk de controle over je leven nemen.
                    </p>
                </div>

            </div>
        </div>


        <!-- Fourth Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-left text-white p-8 lg:p-20 py-20 text-left lg:text-left ">
            <!-- Content goes here -->
    
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Wat kun je verwachten?</h1>
                    <p class="text-base lg:text-lg px-4 lg:px-0 space-y-4">
                        <span class="block">
                            <span class="font-bold">Mentale kracht</span> – Doorbreek negatieve gedachten en bouw zelfvertrouwen op.
                        </span>
                        <span class="block">
                            <span class="font-bold">Discipline & Focus</span> – Geen afleiding, alleen actie.
                        </span>
                        <span class="block">
                            <span class="font-bold">Doorbreek je grenzen</span> – Word de sterkste versie van jezelf.
                        </span>
                        <span class="block">
                            <span class="font-bold">Een krachtige community</span> – Omring jezelf met winnaars.
                        </span>
                    </p>
                </div>

            </div>
        </div>

        <!-- Fifth Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-6 px-4 lg:px-0 text-xl lg:text-4xl uppercase">
                        De <span class="font-bold">keuze</span> is aan jou. Blijf je zitten waar je bent? Of neem je vandaag de eerste stap?
                        <span class="clover-chess"></span>
                    </h2>
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