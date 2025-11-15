@extends('layouts.app')

@section('title', 'Over Ons')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-6 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times">Over Ons</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Teams van The System Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-4 text-2xl lg:text-4xl font-bold uppercase font-times">Het Team van The System – Jouw Steun en Begeleiding</h1>

                    <p class="text-base lg:text-lg mb-4 font-bold">Wij bouwen met jou mee. Elke dag.</p>

                    <p class="text-base lg:text-lg">The System wordt gedragen door mensen die het zelf hebben meegemaakt:</p>
                    <p class="text-base lg:text-lg">twijfel, angst, chaos, depressie, uitstelgedrag en daarna de keuze om te veranderen.</p>
                    <p class="text-base lg:text-lg mb-4">Niet uit boeken. Uit het leven.</p>
                    
                    <p class="text-base lg:text-lg">Wij zijn geen theoretici.</p>
                    <p class="text-base lg:text-lg">Wij zijn geen coaches die op afstand blijven.</p>
                    <p class="text-base lg:text-lg mb-4">Wij zijn mensen die begrijpen hoe het voelt en weten hoe je eruit komt.</p>

                    <p class="text-base lg:text-lg font-bold">Wat jij krijgt:</p>
                    <ul class="list-disc mb-4 list-inside">
                        <li class="text-base lg:text-lg">Eerlijke begeleiding zonder bullshit</li>
                        <li class="text-base lg:text-lg">Support van mensen die je niet laten vallen</li>
                        <li class="text-base lg:text-lg">Tools die direct werken in je dagelijks leven</li>
                        <li class="text-base lg:text-lg">Druk om te groeien, maar nooit om perfect te zijn</li>
                    </ul>

                    <p class="text-base lg:text-lg font-bold">We geven je het systeem dat wij zelf nodig hadden.</p>
                    <p class="text-base lg:text-lg font-bold">En we blijven naast je lopen totdat jij het zelf kunt dragen.</p>
                </div>
            </div>
        </div>

        <!-- Quinn Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>

                    <h1 class="mb-4 text-2xl lg:text-4xl font-bold uppercase font-times">Quinn – De Stem van The System</h1>

                    <p class="text-base lg:text-lg mb-4">
                        Quinn is geen influencer. 
                        Hij is iemand die er doorheen is gegaan en eruit is gekomen met structuur, discipline en mentale kracht.
                    </p>
                    <p class="text-base lg:text-lg mb-4">
                        Geen acteurswerk. Geen filter. Geen show. Elke video, elke boodschap, elke module komt uit zijn eigen proces.
                    </p>

                    <h2 class="text-xl lg:text-2xl text-colorLight font-bold uppercase font-times">Waarom Quinn werkt:</h2>
                    <ul class="list-disc list-outside ml-5 mb-4">
                        <li class="text-base lg:text-lg">Hij spreekt de taal van mensen die vastzitten</li>
                        <li class="text-base lg:text-lg">Hij legt moeilijke dingen simpel uit</li>
                        <li class="text-base lg:text-lg">Hij confronteert je zonder je te breken</li>
                        <li class="text-base lg:text-lg">Hij laat zien dát het kan, omdat hij zelf het bewijs is</li>
                    </ul>
                    <blockquote class="bg-black/20 border-l-4 border-colorPrimary italic px-8 py-4 text-base lg:text-lg mb-4">
                        “Ik vertel je niet wat je moet doen. Ik laat je zien wat werkt.”
                        <footer class="mt-2 font-bold not-italic text-base lg:text-lg">– Quinn</footer>
                    </blockquote>

                    <p class="text-base lg:text-lg mb-4">
                        Quinn staat voor je klaar niet om je te dragen, maar om je te leren bouwen.
                    </p>

                    <h2 class="mb-1 text-xl lg:text-2xl text-colorLight uppercase">Quinn is er om jou te helpen bouwen.</h2>
                    <h2 class="mb-2 text-xl lg:text-2xl text-colorLight uppercase">Stap in. Word wakker. </h2>
                </div>
            </div>
        </div>

        <!-- Team Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Teams</h1>
                    {{-- <p class="text-base lg:text-lg mb-8">
                        Bij The System gaan we systematisch aan het werk en zorgen we voor goede verdeling van taken. 
                        De sterkte skills van de teamleden zorgen ervoor dat jullie zo makkelijk en prettig mogenlijk gebruik kunnen maken van onze diensten.
                    </p> --}}

                    <h2 class="text-xl lg:text-2xl text-colorLight font-bold uppercase font-times">Social Media Team</h2>
                    <p class="text-base lg:text-lg mb-4">
                        Zorgt dagelijks voor content die je wakker schudt, inspireert en richting geeft.
                        Ze bouwen de community op Discord en zorgen dat jij nooit alleen hoeft te strijden.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-colorLight font-bold uppercase font-times">Webdevelopment Team</h2>
                    <p class="text-base lg:text-lg mb-4">
                        Zij zorgen dat alles werkt website, platform, community.
                        Zodat jij altijd toegang hebt tot je mentale onderhoud en modules.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-colorLight font-bold uppercase font-times">Klantenservice Team</h2>
                    <p class="text-base lg:text-lg mb-4">
                        Ons team staat klaar via DM en e-mail.
                        Snel. Menselijk. Begrijpend.
                        Je hoeft nooit te twijfelen of je alleen staat wij reageren altijd.
                    </p>
                    <h2 class="text-xl lg:text-2xl text-colorLight font-bold uppercase font-times">Coaching Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Een ervaren begeleider die jou helpen doorbreken:
                        angst, stress, chaos, depressie, verslavingen, gedragspatronen.
                        Geen oordeel alleen vooruitgang.
                    </p>
                    
                    <h2 class="text-xl lg:text-2xl text-colorLight font-bold uppercase font-times">Dit is The System</h2>
                    <p class="text-base lg:text-lg">Een team dat levens verandert.</p>
                    <p class="text-base lg:text-lg">Een systeem dat je hoofd onderhoudt.</p>
                    <p class="text-base lg:text-lg">Een plek waar je niet hoeft te schreeuwen om gehoord te worden.</p>

                </div>
            </div>
        </div>


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-4 px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
                        Wij geloven in jou – en wij geloven dat jij het in je hebt om meer te bereiken. Samen staan we <span class="font-bold">sterker</span>.
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