@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">The System</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center">Jouw Verhaal, Jouw Kracht</h2>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">
       
        <!-- First Section (2/6) -->
        <div class="bg-black col-span-2 hidden lg:block h-full">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                <image id="theme-image-homepage-logo-full" href="{{ asset('images/logos/TheSystemFull.svg') }}" class="w-full h-full object-cover" />
            </svg>
        </div>

        <!-- Second Section (4/6) -->
        <div class="h-full col-span-4 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
            <!-- Content goes here -->

                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Samen Naar Succes</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        We kennen die momenten wel. Die momenten waarop je je alleen voelt, niet gehoord, of gewoon niet weet waar je heen moet. Maar hier is de waarheid: niemand komt voor je op, tenzij je zelf de stap zet.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Bij The System krijg je geen excuses of valse beloften. Wat je wél krijgt, is een luisterend oor zonder oordeel. Jouw verhaal is belangrijk, en we zijn hier om je te begrijpen, om je te helpen en om je te steunen.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Je staat niet alleen. We zijn hier voor je, als je klaar bent om te luisteren naar jezelf en de eerste stap te zetten naar verandering. Jij bepaalt de richting – wij helpen je te focussen en door te zetten.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Klaar om het anders te doen? The System is hier voor jou.
                    </p>
                    <!-- Space between content and the follow text -->
                    {{-- <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                        Volg The System voor meer! <br>
                        TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-colorPrimary">@thesystemoftheworld</a>.
                    </p> --}}
                </div>

            </div>
        </div>


        <!-- Third Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
            
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Mentorschap & Coaching</h1>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Het moment om je dromen om te zetten in actie is nú. Bij The System begrijpen we dat het behalen van je doelen niet altijd makkelijk is, en dat je soms de juiste richting of begeleiding nodig hebt om verder te komen. Daarom bieden wij persoonlijk mentorschap en coaching – op maat gemaakt voor jouw unieke situatie en ambities.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Onze coaches staan naast je, niet alleen als gidsen, maar als echte partners in jouw reis naar succes. We helpen je niet alleen om je doelen te bereiken, maar we zorgen ervoor dat je je volledige potentieel ontdekt en elke uitdaging aangaat met vertrouwen en focus. Of het nu gaat om het verbeteren van je discipline, het ontwikkelen van sterke gewoontes, of het overwinnen van obstakels die je tegenhouden – wij zorgen ervoor dat je de tools en kennis hebt om te slagen.
                    </p>
                </div>
                
            </div>
        </div>
        
        
        <!-- Fourth Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-start items-center text-white p-4 lg:p-20 py-20 text-left lg:text-left ">
                <!-- Content goes here -->
                
                <div class="">
                    <h1 class="mb-6 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Vertrouwen, Veiligheid en Respect</h1>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Bij The System betekent privacy meer dan alleen vertrouwelijkheid – het betekent respect voor jouw verhaal en veiligheid. Alles wat je met ons deelt, blijft strikt tussen ons. Gegevens worden nooit gedeeld buiten The System. Jou vertrouwen in ons is het belangrijkste aspect van jou reis met The System.
                    </p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">
                        Wij zorgen ervoor dat jij de ruimte hebt om te groeien zonder je zorgen te maken over je persoonlijke informatie of je gevoelens die gedeeld worden. Je hebt de volledige controle. We bieden je een veilige omgeving om te werken aan je doelen zonder externe invloeden of oordelen.
                    </p>
                    {{-- <p class="text-base lg:text-lg px-4 lg:px-0 space-y-4">
                        <span class="block">
                            <span class="font-bold">Mentale kracht</span> – Doorbreek negatieve gedachten en bouw zelfvertrouwen op.
                        </span>
                        <span class="block">
                            <span class="font-bold">Discipline & Focus</span> – Geen afleiding, alleen actie.
                        </span>
                        <span class="block">
                            <span class="font-bold">Doorbreek je grenzen</span> – Word de sterkste versie van jezelf.
                        </span>
                        <span class="block">
                            <span class="font-bold">Een krachtige community</span> – Omring jezelf met winnaars.
                        </span>
                    </p> --}}
                </div>

            </div>
        </div>

        <!-- Fifth Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-6 px-4 lg:px-0 text-xl lg:text-4xl uppercase">
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