@extends('layouts.app')

@section('title', 'Misie & Visie')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-1 lg:bg-h-backdrop-3 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Misie & Visie</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- First Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
            
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Onze Visie</h1>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        The System is gebouwd voor degenen die weigeren middelmatig te zijn. Wij zijn hier om je te ontwaken, om je te laten zien dat jij de controle hebt over je eigen leven. Geen excuses, geen twijfel – alleen actie. Wij bieden de kennis, mindset en tools om sterker te worden, mentaal en fysiek. Dit is niet voor iedereen. Dit is voor doorzetters.                    </p>
                </div>

            </div>
        </div>


        <!-- Second Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-left text-white p-8 lg:p-20 py-20 text-left lg:text-left ">
            <!-- Content goes here -->
    
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Onze Missie</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Namens The System zien wij het overal. Mensen die vast in hun eigen hoofd zitten. Gevangen in een systeem dat hen klein houdt. Twijfel. Angst. Uitstelgedrag. Het vreet je op.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Wij accepteren dat niet. Wij bouwen een beweging. Sterke individuen die hun eigen pad bepalen. Geen slachtoffers, geen volgers.
                    </p>
                </div>

            </div>
        </div>


    </div>
</div>

@endsection