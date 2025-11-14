@extends('layouts.app')

@section('title', 'Contact')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-7 lg:bg-h-backdrop-1 bg-cover relative m-0"> {{-- todo: add a fifth backdrop and set it here --}}
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times">Contact</h1>
                {{-- <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times">Support is dichtbij</h2> --}}
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Contact The System</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Heb jij vragen, ideeën of wil je direct in contact komen met The System? Dit is geen standaard platform wij zijn hier om actie te ondernemen en verandering te brengen.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Gebruik het contactformulier om ons te bereiken. Of je nu vastzit, hulp nodig hebt of simpelweg klaar bent om de volgende stap te zetten, wij luisteren.
                    </p>
                    <p class="text-base lg:text-lg">
                        Als je meer zoekt of de drempel te hoog vindt, overweeg dan onze community te bekijken.
                    </p>
                </div>

            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-center items-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">

                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Word deel van onze community</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Wil je snel schakelen of direct hulp van onze community? Sluit je aan bij onze officiële Discord-server. Hier kun je vragen stellen, ervaringen delen en ondersteuning krijgen van zowel ons team als andere communityleden.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Met Discord kun je eenvoudig in contact blijven en zelfs direct een bericht naar ons sturen als dat nodig is.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Deelname aan onze community betekent niet dat je verplicht bent om actief te posten. Je bent ook welkom om alleen te kijken, te leren van anderen en inspiratie op te doen.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        <button onclick="window.location.href='{{ $discordInviteLink }}'" class="bg-colorPrimary/60 text-colorLight py-2 px-4 rounded hover:bg-colorPrimary/80 transition">
                            Join de Discord Community
                        </button>
                    </p>
                </div>

            </div>
        </div>

        @include('layouts.email-form')
        
    </div>
</div>

@endsection