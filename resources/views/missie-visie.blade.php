@extends('layouts.app')

@section('title', 'Misie & Visie')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-1 lg:bg-h-backdrop-3 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times ">Misie & Visie</h1>
                {{-- <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times">Begin vandaag met het nemen van actie</h2> --}}

            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
            
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Visie</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System geloven we dat jij niet bent gemaakt voor een middelmatig leven.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Misschien voel je je vast. Misschien twijfel je. Misschien weet je niet waar je moet beginnen.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Dat betekent niet dat jij zwak bent. Het betekent dat je nog geen systeem hebt.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Wij zien jou. Niet zoals je nu bent maar zoals je kunt worden. Sterker. Scherper. Mentaal en fysiek.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Wij geven je geen motivatiepraat. Wij geven je structuur, ritme en bewijs. Elke dag opnieuw. Taken. Reflectie. Groei.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        The System is gebouwd voor mensen die willen vechten. Die willen bouwen. Die niet meer terug willen naar vroeger.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Als jij bereid bent om op te staan dan staan wij met je. Geen excuses. Geen half werk. Alleen progressie.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Welkom bij The System. Dit is waar je begint.
                    </p>
                </div>

            </div>
        </div>


        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-start items-left text-white p-4 lg:p-20 responsive-height text-left lg:text-left ">
            <!-- Content goes here -->
    
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Missie</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        We zien het elke dag: mensen vast in hun hoofd. Gevangen in angst, twijfel, uitstelgedrag.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Niet omdat ze zwak zijn, maar omdat het systeem om hen heen ze klein houdt.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Wij accepteren dat niet. Niet voor jou.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Jij bent geen slachtoffer van je omstandigheden. Jij bent degene die te lang heeft gelopen met het zelfde probleem.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System bouwen we Sterke, zelfbewuste individuen die hun leven niet langer laten bepalen door angst of gemak.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Geen smoesjes. Geen stilstand. Wel keuzes. Discipline. Groei.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Dit is geen opgeven Dit is een beweging. Jouw kans om je verhaal opnieuw te schrijven.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Ben jij klaar om te beginnen?
                    </p>
                </div>

            </div>
        </div>

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Platform</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Dit is meer dan een platform. Dit is een beweging. Een beweging voor jou, voor de mensen die niet genoegen nemen met middelmatigheid. Jij voelt diep van binnen dat je voor iets groters bent gemaakt, maar de twijfel houdt je vast. Waarom wacht je nog?
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Weet je wat het verschil maakt? Actie.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        The System is voor mensen die niet opgeven. Het is voor degenen die klaar zijn om de waarheid te horen en eindelijk de confrontatie aan te gaan met de excuses die je tegenhouden. Jij hebt de keuze: blijf je vastzitten in je oude patronen of kies je voor jezelf, voor groei, voor succes.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Je hebt geen tijd te verliezen. Elke seconde die je wacht, is een kans die je verliest. Het moment om te veranderen is nu.
                    </p>
                    <!-- Extra space between the text and the follow text -->
                    <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System voor meer en begin vandaag met het nemen van actie. <br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p>
                </div>

            </div>
        </div>


    </div>
</div>

@endsection