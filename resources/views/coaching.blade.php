@extends('layouts.app')

@section('title', 'Coaching') <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Coaching</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center hidden lg:block">jouw eerste stap begint hier</h2>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Waarom je hier bent + Wat je hier kunt doen merged -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Waarom je hier bent</h2>
                <p class="text-base lg:text-lg mb-2">Je bent hier omdat je voelt dat het anders moet. Dat er meer in je zit. En dat je niet wéér motivatie wilt die verdwijnt. Je wilt iets dat blijft.</p>
                <p class="text-base lg:text-lg mb-2">Daarom is deze pagina er. Om jou vrijblijvend te laten kennismaken met The System. Zonder verplichtingen. Zonder druk.</p>
                <p class="text-base lg:text-lg mb-2">Wij hebben zelf de twijfel meegemaakt. The System is er niet zomaar. Het is de plek waar je eerlijk ontdekt of dit bij je past. Omdat wij het ook hebben gedaan.</p>
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times my-6">Wat je hier kunt doen</h2>
                <ul class="list-disc list-inside mb-6 text-base lg:text-lg">
                    <li>Stel je vraag aan ons team open en zonder oordeel.</li>
                    <li>Krijg direct uitleg over hoe The System jou helpt bouwen.</li>
                    <li>Laat je e-mailadres achter en we nemen persoonlijk contact met je op.</li>
                </ul>
            </div>
        </div>

        @include('layouts.coaching-table')

        <!-- Resultaten / Reviews Section -->
        <div class="h-auto lg:h-full col-span-6 mt-10"> <!-- Added margin-top for spacing NEEDS TO BE FIXED-->
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Resultaten / Reviews</h2>
                <p class="text-base lg:text-lg mb-6">Onze leden behalen indrukwekkende resultaten met The System. Hieronder enkele ervaringen en reviews van mensen die jou voorgingen.</p>
                <p class="text-base lg:text-lg italic">[Hier komen binnenkort testimonials en succesverhalen]</p>
            </div>
        </div>

        <!-- Zo werkt onze aanpak Section -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Zo werkt onze aanpak</h2>
                <ol class="list-decimal list-inside space-y-4 text-base lg:text-lg">
                    <li><strong>Intake</strong> – We starten met een persoonlijk gesprek om jouw doelen en wensen te begrijpen.</li>
                    <li><strong>Kennismaking</strong> – Maak kennis met je coach en de methodiek van The System.</li>
                    <li><strong>Plan</strong> – Samen stellen we een plan op dat past bij jouw situatie en ambities.</li>
                    <li><strong>Coaching</strong> – Je ontvangt begeleiding en tools om je doelen te behalen.</li>
                    <li><strong>Groei</strong> – Je ontwikkelt jezelf en bouwt aan duurzame verandering.</li>
                </ol>
            </div>
        </div>

        <!-- Disclaimer Section -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Disclaimer</h2>
                <p class="text-base lg:text-lg">The System biedt mentale begeleiding en persoonlijke structuurcoaching – geen therapie of behandeling. Onze coaching richt zich op persoonlijke groei, structuur en motivatie. Wij stellen geen diagnoses en vervangen geen professionele zorg. Bij ernstige klachten adviseren wij contact op te nemen met een gekwalificeerde zorgverlener.</p>
            </div>
        </div>

    </div>
</div>

@endsection
