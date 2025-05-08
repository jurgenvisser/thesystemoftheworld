@extends('layouts.app')

@section('title', 'Voor Bedrijven')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-4 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Voor Bedrijven</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height  flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Mentale veerkracht & structuur voor jouw team</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Bij The System begrijpen we hoe het écht is. We zien hoe medewerkers worstelen met druk, afleiding en het constante gevoel achter de feiten aan te lopen. Hoe motivatie wegglijdt en focus ver te zoeken is. We weten: als mensen zich mentaal niet goed voelen, heeft dat impact op de hele organisatie.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Daarom helpen wij bedrijven om rust, ritme en richting terug te brengen. Geen standaardverhalen, maar begeleiding die aansluit bij wat mensen écht nodig hebben. Met coaching, praktische ondersteuning en eerlijke gesprekken zorgen we ervoor dat teams weer grip krijgen op hun werk én op zichzelf.
                    </p>
                    <p class="text-base lg:text-lg">
                        Want als je mensen sterker maakt, groeit de organisatie vanzelf mee.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (twee blokken) (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex flex-col gap-10">
            
            <!-- Eerste blok -->
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times text-start">Waarom kiezen voor The System?</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Veel medewerkers voelen zich overbelast, maar durven dat niet toe te geven. Focus verdwijnt, productiviteit daalt en motivatie neemt af. Ze raken overweldigd, reageren in plaats van vooruit te denken, en verliezen het overzicht.
                    </p>
                    <p class="text-base lg:text-lg">
                        The System biedt direct toepasbare oplossingen met resultaten op korte termijn.
                    </p>
                </div>
            </div>
            
            <!-- Tweede blok -->
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times text-start">Waarom bedrijven voor The System kiezen</h1>
                    <ul class="list-disc pl-8 list-outside">
                        <li class="text-base lg:text-lg mb-2">Medewerkers krijgen weer grip op hun werk én hun leven.</li>
                        <li class="text-base lg:text-lg mb-2">Directe veranderingen dankzij praktische begeleiding en concrete stappen.</li>
                        <li class="text-base lg:text-lg mb-2">Minder mentale uitval en meer stabiliteit en werkplezier.</li>
                        <li class="text-base lg:text-lg">Geen vage trajecten, maar eerlijke begeleiding met tastbare resultaten.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times text-start">Wat wij voor jouw organisatie doen</h1>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times text-start">Mentale hersteltrajecten voor werknemers</h2>
                    <p class="text-base lg:text-lg mb-6">
                        Wij helpen je medewerkers hun mentale balans en veerkracht te herstellen met concrete tools zoals:
                    </p>
                    <ul class="list-disc pl-8 mb-8 list-outside">
                        <li class="text-base lg:text-lg mb-2"><span class="font-bold">Mentaal welzijn-programma’s:</span> Gericht op stressvermindering en meer focus.</li>
                        <li class="text-base lg:text-lg mb-2"><span class="font-bold">Praktische coaching:</span> Doorbreken van blokkades en negatieve patronen.</li>
                        <li class="text-base lg:text-lg"><span class="font-bold">Dagelijkse actieplannen:</span> Voor focus en effectiviteit op het werk én rust en structuur in het privéleven.</li>
                    </ul>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times text-start">Structurele ondersteuning voor dagelijks werk</h2>
                    <p class="text-base lg:text-lg mb-6">
                        Wij zorgen voor een aanpak die medewerkers in hun dagelijkse taken ondersteunt:
                    </p>
                    <ul class="list-disc pl-8 list-outside">
                        <li class="text-base lg:text-lg mb-2"><span class="font-bold">Ritme- en structuurtraining:</span> Helpt routines opbouwen die focus en overzicht bieden.</li>
                        <li class="text-base lg:text-lg"><span class="font-blod">Tijdmanagement-coaching:</span> Geen chaos meer, maar duidelijke prioriteiten.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 w-full text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times text-start">Wat kost het om niets te doen?</h1>
                    <ul class="list-disc pl-8 list-outside">
                        <li class="text-base lg:text-lg mb-2">Verlies van productiviteit door overwerkt personeel.</li>
                        <li class="text-base lg:text-lg mb-2">Teams zonder focus of structuur, wat onrust veroorzaakt.</li>
                        <li class="text-base lg:text-lg">Hogere kosten door langdurige uitval en vertraging in uitvoering.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times text-start">Plan een kennismaking met ons team</h1>
                    <p class="text-base lg:text-lg mb-6">
                        De stap naar hulp kan lastig zijn, maar wij maken het eenvoudig. We helpen je medewerkers sterker te worden – zowel mentaal als professioneel.
                    </p>
                    <p class="text-base lg:text-lg">
                        Maak een afspraak en ontdek hoe The System jouw organisatie naar een hoger niveau tilt.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
                        Wij helpen uw bedrijf te functioneren op een hoger niveau. <span class="font-bold">Professioneel</span> én <span class="font-bold">persoonlijk</span>.
                        <span class="clover-chess"></span>
                    </h2>
                    <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Neem vandaag nog contact op!<br>
                        Email: <a href="mailto:contact@thesystemoftheworld.com" target="_blank" class="underline decoration-colorPrimary">contact@thesystemoftheworld.com</a>
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection