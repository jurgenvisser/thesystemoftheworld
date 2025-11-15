@extends('layouts.app')

@section('title', 'Contact')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-7 lg:bg-h-backdrop-1 bg-cover relative m-0"> {{-- todo: add a fifth backdrop and set it here --}}
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times">Contact</h1>
                {{-- <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times">Support is dichtbij</h2> --}}
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Contact The System</h1>
                    <p class="text-base lg:text-lg mb-4 font-bold">
                        Je hoeft dit niet alleen te doen.
                    </p>
                    <p class="text-base lg:text-lg mb-4">
                        Heb je vragen, zit je vast, of weet je niet waar je moet beginnen?
                        Bij The System praat je niet met een robot of een standaard klantenservice 
                        je praat met mensen die begrijpen wat er in je hoofd gebeurt.
                    </p>
                    <p class="text-base lg:text-lg mb-4">
                        Wij zijn hier niet voor verkooppraat.
                        Wij zijn hier voor verandering, begeleiding en echte steun.
                    </p>
                    <p class="text-base lg:text-lg">
                        Gebruik het formulier om ons te bereiken.
                        Je krijgt altijd een persoonlijk antwoord.
                    </p>
                </div>

            </div>
        </div>

{{-- 
WIL JE SNELLER HULP? – SLUIT JE AAN BIJ DE COMMUNITY

Onze Discord-community is er voor iedereen die steun, richting of rust nodig heeft.

Wat je daar vindt:
    •    
    •    
    •    
    •    

Je hoeft niet actief te zijn.
Je hoeft niet te praten.
Je hoeft alleen binnen te stappen.

👉 Join de Discord Community
--}}

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-center text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">

                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Wil je sneller hulp? - Sluit je dan aan bij de Community</h1>
                    <p class="text-base lg:text-lg mb-4">
                        Onze Discord-community is er voor iedereen die steun, richting of rust nodig heeft.
                    </p>
                    <p class="text-base lg:text-lg">
                        Wat je daar vindt:
                    </p>
                    <ul class="list-disc list-outside ml-5 mb-4">
                        <li class="text-base lg:text-lg">Mensen die precies snappen hoe het voelt</li>
                        <li class="text-base lg:text-lg">Direct advies en support</li>
                        <li class="text-base lg:text-lg">Een plek waar je kunt praten of gewoon stil kunt meelezen</li>
                        <li class="text-base lg:text-lg">Coaches en teamleden die reageren wanneer jij vastloopt</li>
                    </ul>
                    <p class="text-base lg:text-lg">Je hoeft niet actief te zijn.</p>
                    <p class="text-base lg:text-lg">Je hoeft niet te praten.</p>
                    <p class="text-base lg:text-lg mb-6">Je hoeft alleen binnen te stappen.</p>

                    <a href="{{ $discordInviteLink }}" class="bg-colorPrimary/60 text-colorLight text-base md:text-lg lg:text-xl px-6 py-2 rounded-lg shadow hover:bg-colorPrimary/80 w-full">
                        Join de Discord Community
                    </a>
                </div>

            </div>
        </div>

        @include('layouts.email-form')
        
    </div>
</div>

@endsection