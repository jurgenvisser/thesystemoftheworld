@extends('layouts.app')

@section('title', 'Merchandise')  <!-- Set the title for this page -->

@section('content')

@include('layouts.admin-testing-panel')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Merchandise</h1>
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
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Merchandise</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        The System gaat verder dan woorden – het wordt een beweging die je kunt dragen. Dit is het moment van de eerste drop van The System. Bezoek de store om het eerste hulpmiddel te downloaden dat jouw leven gaat veranderen. Dit zal later uitgebreid worden met exclusieve merchandise, ontworpen voor degenen die begrijpen wat het betekent om te groeien, te strijden en te winnen.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Dit is niet zomaar een store en niet zomaar kleding. Dit is een symbool van discipline, kracht en doorzettingsvermogen. 
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Ben jij klaar om deel uit te maken van The System? Blijf scherp, want het eerste product is een feit, en er is meer onderweg. Houd de socials in de gaten voor exclusieve hints naar toekomstige producten.
                    </p>
                    <a href="http://store.thesystemoftheworld.com" target="_blank" class="animate-underline animate-text-color theme-primary bg-black px-4 py-2 ml-4 lg:ml-0 rounded text-base lg:text-lg">The System Store</a>
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