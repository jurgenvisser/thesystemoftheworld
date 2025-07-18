@extends('layouts.app')

@section('title', 'Over Ons')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-6 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Over Ons</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Het Team van The System – Jouw Steun en Begeleiding</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Het team van The System bestaat niet uit mensen die je vertellen wat je zou moeten doen. Wij laten zien wat werkt, omdat we het zelf hebben geleefd.
                    </p>
                    <p class="text-base font-bold lg:text-lg">
                        Iedereen in dit team kent het:
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Twijfel. Uitstel. Leegte. En daarna: Kiezen. Bouwen. Doorgaan.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Wij zijn niet perfect. Maar wel echt. Geen theorie, geen toneel alleen bewezen tools, harde lessen en eerlijke begeleiding.
                    </p>
                    <p class="text-base lg:text-lg font-bold mb-2">
                        Wat jij krijgt?
                    </p>
                    <ul class="list-disc mb-6 list-inside">
                        <li class="text-base lg:text-lg mb-2">Support van mensen die je niet sparen, maar sterker maken.</li>
                        <li class="text-base lg:text-lg mb-2">Praktische tools die direct toepasbaar zijn.</li>
                        <li class="text-base lg:text-lg mb-2">Begrip voor waar je zit, en druk om er niet te blijven.</li>
                    </ul>
                    <p class="text-base lg:text-lg font-bold">
                        We zijn hier om je systeem te geven dat je leven verandert.
                    </p>
                    <p class="text-base lg:text-lg font-bold">
                        En we gaan ernaast staan tot je het waarmaakt.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">De Teams van The System</h1>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Social Media Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Ons team deelt dagelijks content om je te inspireren en motiveren. Ze bouwen een community op Discord die je helpt gefocust te blijven en vooruit te gaan door interactie te bevorderen.
                </p>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Webdevelopment Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Onze tech-experts zorgen dat de website soepel werkt, zodat jij makkelijk toegang hebt tot alle tools en info die je nodig hebt. Ze beheren ook de Discord-server en zorgen voor een fijne ervaring voor onze community.
                    </p>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Klantenservice Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Ons supportteam staat klaar om je snel en persoonlijk te helpen via direct message of e-mail. Jij hoeft je geen zorgen te maken – we zorgen voor je.
                    </p>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Coaching Team</h2>
                    <p class="text-base lg:text-lg">
                        Onze coaches bieden maatwerkbegeleiding en helpen je door middel van persoonlijke coaching om je doelen te bereiken en obstakels te overwinnen.
                    </p>

                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Quinn – het gezicht van The System</h1>

                    <p class="text-base lg:text-lg mb-6">
                        Quinn is geen influencer. Hij is The System. Niet geboren als leider. Maar gevormd door strijd, structuur en discipline.
                    </p>
                    <p class="text-base lg:text-lg mb-6">
                        Elke video, elke boodschap komt recht uit zijn eigen proces. Geen show. Geen scripts. Alleen echte verhalen en harde waarheden. Want verandering begint pas als iemand je durft te confronteren.
                    </p>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Wat doet Quinn?</h2>
                    <ul class="list-disc mb-2 list-inside">
                        <li class="text-base lg:text-lg mb-2">Hij spreekt de taal van de community, omdat hij zelf één van hen was</li>
                        <li class="text-base lg:text-lg mb-2">Hij zet je stil met simpele waarheden die je wakker schudden</li>
                        <li class="text-base lg:text-lg mb-2">Hij bouwt connectie en vertrouwen door te laten zien dat hij het leeft</li>
                    </ul>
                    <blockquote class="bg-black/20 border-l-4 border-colorPrimary italic px-8 py-4 text-base lg:text-lg mb-6">
                        “Ik vertel je niet wat je moet doen. Ik laat je zien wat werkt.”
                        <footer class="mt-2 font-bold not-italic text-base lg:text-lg">– Quinn</footer>
                    </blockquote>

                    <p class="text-base lg:text-lg mb-6">
                        AI-stem ‘Lior’ blijft beschikbaar op aanvraag, maar The System wordt nu geleid door een echte stem, echt verhaal, echte mens.
                    </p>

                    <h2 class="mb-1 text-xl lg:text-2xl text-white uppercase">Quinn is er om jou te helpen bouwen.</h2>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white uppercase">Stap in. Word wakker. </h2>
                </div>
            </div>
        </div>

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
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