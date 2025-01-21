@extends('layouts.app')

@section('title', 'Coming-Soon')  <!-- Set the title for this page. -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                <h1 class="text-4xl font-bold uppercase font-times mb-8">Coming Soon</h1>

                <!-- Text below the title -->
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

                <!-- Extra space between the text and the follow text -->
                <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                    Volg The System voor meer! <br>
                    TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-systemYellow">@thesystemoftheworld</a>.
                </p>
                <div class="w-full bg-black block lg:hidden pt-2 lg:pt-0">
                    {!! file_get_contents(public_path('images/logos/TheSystemCrypto.svg')) !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

