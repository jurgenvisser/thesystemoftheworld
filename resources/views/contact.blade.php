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
                {{-- <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times">Support is dichtbij</h2> --}}
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 pt-12 lg:pt-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Het Team van The System – Jouw Steun en Begeleiding</h1>
                
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System bestaat ons team uit mensen die echt begrijpen wat je doormaakt. We hebben geen personeel die alleen theorieën delen; we zijn mensen die zelf ook hebben gevochten, geleerd en gegroeid. We hebben allemaal momenten gekend van onzekerheid, tegenslagen en het gevoel vast te zitten. En nu willen we onze ervaring en kennis met jou delen om je te helpen verder te komen.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-white font-bold uppercase font-times px-4 lg:px-0">Social Media Team</h2>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Ons team creëert en deelt dagelijks waardevolle content om je te inspireren en te motiveren. Ze bouwen een online community die jou helpt gefocust te blijven en vooruit te gaan.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-white font-bold uppercase font-times px-4 lg:px-0">Webdevelopment Team</h2>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Onze tech-experts zorgen ervoor dat onze website altijd soepel werkt, zodat jij gemakkelijk toegang hebt tot alle tools en informatie die je nodig hebt om verder te komen.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-white font-bold uppercase font-times px-4 lg:px-0">Klantenservice Team</h2>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Ons supportteam staat klaar om je snel en persoonlijk te helpen via direct message of e-mail. Jij hoeft je geen zorgen te maken – we zorgen voor je.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-white font-bold uppercase font-times px-4 lg:px-0">Coaching Team</h2>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Onze coaches bieden maatwerkbegeleiding en helpen je door middel van persoonlijke coaching om je doelen te bereiken en obstakels te overwinnen.
                    </p>
                    <p class="text-base lg:text-lg my-12 px-4 lg:px-0">
                        ⸻
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System ben je nooit alleen. Ons team werkt elke dag hard om jou te voorzien van de tools, begeleiding en ondersteuning die je nodig hebt om te slagen. Wij zijn er om je te helpen groeien, ongeacht waar je nu staat.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Wij geloven in jou – en wij geloven dat jij het in je hebt om meer te bereiken. Samen staan we sterker.
                    </p>
                    <!-- Extra space between the text and the follow text -->
                    <p class="text-base lg:text-lg px-4 lg:px-0">
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