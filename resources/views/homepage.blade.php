@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times hidden lg:block">The System</h1>
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times block lg:hidden">Jouw verhaal</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center hidden lg:block">Jouw Verhaal, Jouw Kracht</h2>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center block lg:hidden">Jouw Kracht</h2>
            </div>

        </div>
    </div>
</div>

<!-- Scroll Banner Section -->
@include('components.scroll-banner')

{{-- @include('components.cta') --}}

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">
       
        <!-- Image Section (2/6) -->
        <div class="bg-black col-span-2 hidden lg:block h-full">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                <image id="theme-image-homepage-logo-full" href="{{ asset('images/logos/TheSystemFull.svg') }}" class="w-full h-full object-cover" />
            </svg>
        </div>

        <!-- Call-To-Action Section (6/6) -->
        <div class="h-auto lg:h-full col-span-4 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-8 lg:mb-16 px-4 lg:px-0 text-4xl lg:text-5xl uppercase">
                        Klaar om te <span class="font-bold">beginnen</span>?
                        <span class="clover-chess"></span>
                    </h2>
                    <p class="text-base lg:text-lg mb-2 px-4 lg:px-0">
                        Wat je vandaag niet doet, bepaal je morgen. Je weet allang dat er meer in je zit. Alleen jouw volgende stap helder en haalbaar.
                    </p>
                    <p class="text-base lg:text-lg mb-8 lg:mb-16 px-4 lg:px-0">
                        The System is er al. Nu jij nog.
                    </p>
                    <a
                        href="/kennis-maken"
                        class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-2 px-4 mx-4 lg:mx-0 hover:bg-gray-800">
                        Vrijblijvend kennismaken? Klik hier!
                    </a>
                </div>

            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-left">Jouw verhaal, jouw kracht</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Voel je je soms alleen, niet gehoord of onzeker over je toekomst? Bij The System staan we klaar met een luisterend oor zonder oordeel en een community die jou écht ziet. Jouw verhaal telt, en jij hebt de kracht om je leven te veranderen.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Sluit je aan bij onze community op Telegram en ervaar de kracht van samen sterk staan. Jij bepaalt zelf de richting, maar je staat er niet alleen voor.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Persoonlijk Mentorschap & Coaching</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Elke verandering begint met een stap. Wil je discipline versterken, gewoontes verbeteren, of obstakels overwinnen? Onze mentoren helpen je.
                    </p>
                    <ul class="list-disc list-inside mb-6 text-base lg:text-lg px-4 lg:px-0">
                        <li>Maatwerkcoaching: Persoonlijke begeleiding afgestemd op jouw doelen.</li>
                        <li>Sterke gewoontes: Leer routines die jou verder helpen.</li>
                        <li>Volledig potentieel: Ontdek jouw talenten en kracht.</li>
                    </ul>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Samen zorgen we ervoor dat je jouw ambities werkelijkheid maakt.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Vertrouwen, Veiligheid & Privacy</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System draait alles om jouw groei én jouw vertrouwen. Wat je met ons deelt blijft strikt tussen ons – jouw privacy is heilig.
                    </p>
                    <ul class="list-disc list-inside mb-6 text-base lg:text-lg px-4 lg:px-0">
                        <li>Vertrouwelijkheid: Alles wat je deelt blijft privé.</li>
                        <li>Veilige omgeving: Steun zonder oordeel.</li>
                        <li>Jij in controle: Jij bepaalt wat je deelt.</li>
                    </ul>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Richt je zonder zorgen op wat écht telt: jouw ontwikkeling.
                    </p>
                </div>
            </div>
        </div>

        <!-- BText Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times text-balance">Blijf geïnspireerd</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Volg The System voor meer inspiratie en dagelijkse motivatie. Sluit je aan bij onze beweging en blijf op de hoogte via social media:
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Word vandaag nog onderdeel van The System en zet samen met ons die eerste stap!
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Quote Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
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