@extends('layouts.app')

@section('title', 'Brand')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                <h1 class="text-5xl font-bold uppercase font-times mb-8">Brand</h1>

                <!-- Text below the title -->
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Wij begrijpen dat jouw merk meer is dan alleen een logo en een naam. Het is een verhaal, een identiteit, en een gevoel. En dat is precies wat The System helpt te creëren.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Op dit moment werken we hard aan het ontwikkelen van een platform dat jouw merk helpt groeien, je boodschap te versterken en je merk te onderscheiden van de rest.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Dit wordt een beweging. The System is voor de merken die willen winnen, die vastberaden zijn om door te breken in de wereld.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Blijf op de hoogte voor updates en wees de eerste die toegang krijgt tot exclusieve content, producten, en meer.
                </p>
                
                <!-- Extra space between the text and the follow text -->
                <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                    Volg The System voor meer! <br>
                    TikTok: @thesystemoftheworld.
                </p>
            </div>

        </div>
    </div>
</div>

@endsection