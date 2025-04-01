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
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- First Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
            
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Visie</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System begrijpen we dat jij niet hier bent om middelmatig te zijn. We weten hoe het voelt om vast te zitten, twijfels te hebben en niet te weten waar je moet beginnen. Maar jij hebt de kracht om je leven te veranderen. Dit is je moment om te ontwaken, om te begrijpen dat jij de controle hebt.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Jij verdient meer. We bieden je niet alleen kennis, maar een verandering van mindset en de tools om mentaal en fysiek sterker te worden. Dit is voor de doorzetters. Als jij bereid bent om alles te geven, zijn wij hier om je te helpen.
                    </p>
                </div>

            </div>
        </div>


        <!-- Second Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-start items-left text-white p-4 lg:p-20 py-20 text-left lg:text-left ">
            <!-- Content goes here -->
    
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Missie</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        We zien te veel mensen die gevangen zitten in hun eigen angsten, twijfels en uitstelgedrag. Ze voelen zich klein, vast in een systeem dat hen tegenhoudt. Maar we accepteren dit niet voor jou. Jij bent niet het slachtoffer van je omstandigheden. Bij The System bouwen we een beweging van mensen die kiezen om sterker te worden, om zelf de regie over hun leven te nemen. Geen excuses. Alleen sterke, onafhankelijke individuen die zich niet laten stoppen. Dit is jouw kans om je verhaal opnieuw te schrijven. Ben jij er klaar voor om te beginnen?
                    </p>
                    {{-- <p class="text-base lg:text-lg px-4 lg:px-0">
                        Wij accepteren dat niet. Wij bouwen een beweging. Sterke individuen die hun eigen pad bepalen. Geen slachtoffers, geen volgers.
                    </p> --}}
                </div>

            </div>
        </div>

        <!-- Third Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
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