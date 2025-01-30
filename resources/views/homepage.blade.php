@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-systemYellow/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Homepage</h1>
            </div>

        </div>
    </div>
</div>

<div class="h-auto bg-systemYellow/20 m-0 py-24 space-y-10">

    <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative lg:space-x-10">
        <!-- Image Section -->
        <div class="border-0 lg:border-[1.95rem] lg:border-black">
            <div class="lg:w-[600px] bg-black hidden lg:block">
                {!! file_get_contents(public_path('images/Logos/TheSystemFull.svg')) !!}
            </div>
        </div>

        <!-- Text Content Section -->
        <div class="bg-systemYellow/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 h-auto w-[85vw] lg:w-[40.9vw] text-justify leading-loose">
            <div class="">
                <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Introductie</h1>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    We begrijpen dat je hier bent omdat je iets zoekt. Een antwoord, een oplossing, een stap vooruit. En dat is precies wat The System biedt.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Op dit moment zijn we hard bezig met het bouwen van een platform dat jouw leven kan veranderen. Een plek waar je de tools vindt om te groeien, sterker te worden, en jezelf te ontdekken.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Dit wordt een beweging. The System is voor de mensen die willen winnen, die vastberaden zijn om door te breken.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Blijf op de hoogte voor updates en wees de eerste die toegang krijgt tot exclusieve content, producten, en meer!
                </p>
                <!-- Space between content and the follow text -->
                <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                    Volg The System voor meer! <br>
                    TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-systemYellow">@thesystemoftheworld</a>.
                </p>
            </div>
        </div>
    </div>

    <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative lg:space-x-10">
        <div class="bg-systemYellow/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 h-auto w-[85vw] lg:w-[80vw] text-justify leading-loose">
            <div class="">
                <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Groei naar succes</h1>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Sta jij stil in het leven? Voelt elke dag hetzelfde, zonder echte vooruitgang? The System is hier om dat te doorbreken.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Dit is geen plek voor excuses. Dit is een beweging voor mensen die écht willen groeien. Mentaal sterker worden, meer discipline opbouwen en eindelijk de controle over je leven nemen.
                </p>
                <h2 class="mb-6 px-4 lg:px-0 text-lg lg:text-2xl font-bold uppercase font-times">Wat kun je verwachten?</h2>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0 space-y-4">
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
                </p>
                <h2 class="mb-6 px-4 lg:px-0 text-lg lg:text-2xl font-bold uppercase font-times">
                    De keuze is aan jou. Blijf je zitten waar je bent? Of neem je vandaag de eerste stap?
                    <span class="clover-chess"></span>
                </h2>
            </div>
        </div>
    </div>
</div>

@endsection