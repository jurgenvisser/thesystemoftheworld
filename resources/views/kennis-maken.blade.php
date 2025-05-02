@extends('layouts.app')

@section('title', 'Kennis Maken') <!-- Set the title for this page --> 

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

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Waarom je hier bent</h2>
                <p class="text-base lg:text-lg mb-6">Je bent hier omdat je voelt dat het anders moet. Dat er meer in je zit. En dat je niet wéér motivatie wilt die verdwijnt. Je wilt iets dat blijft.</p>
                <p class="text-base lg:text-lg">Daarom is deze pagina er. Om jou vrijblijvend te laten kennismaken met The System. Zonder verplichtingen. Zonder druk.</p>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Wat je hier kunt doen</h2>
                <ul class="list-disc list-inside px-4 lg:px-0 text-base lg:text-lg">
                    <li>Stel je vragen aan ons team</li>
                    <li>Krijg uitleg over hoe The System werkt</li>
                    <li>Of laat gewoon je e-mailadres achter, dan nemen we contact met je op</li>
                </ul>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Vertrouwen versterken</h2>
                <p class="text-base lg:text-lg">Je hoeft nu nog niks te beslissen. Maar je kunt wel vandaag beginnen met helderheid.</p>
                {{-- <div class="mt-6">
                    <a href="INSERT_LINK_TO_STORE" class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800"">Plan je kennismaking</a>
                </div> --}}
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Toch nog twijfels?</h2>
                <ul class="list-disc list-inside px-4 lg:px-0 text-base lg:text-lg">
                    <li>Bekijk een korte video waarin Lior uitlegt dat je vrijblijvend een gesprek kunt plannen.</li>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
