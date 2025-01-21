@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                <h1 class="text-4xl font-bold uppercase font-times mb-8">Homepage</h1>

                <!-- Text below the title -->
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    We begrijpen dat je hier bent omdat je iets zoekt. Een antwoord, een oplossing, of een stap vooruit. En dat is precies wat The System biedt.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Op dit moment zijn we hard bezig met het bouwen van een platform dat jouw leven kan veranderen. Een plek waar je de tools vindt om te groeien, sterker te worden, en jezelf te ontdekken.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Dit wordt een beweging. The System is voor degenen die willen winnen, die vastberaden zijn door te breken.
                </p>
                <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                    Blijf op de hoogte voor updates en wees de eerste die toegang krijgt tot exclusieve content, producten, en meer.
                </p>
                
                <!-- Space between content and the follow text -->
                <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                    Volg The System voor meer! <br>
                    TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-systemYellow">@thesystemoftheworld</a>.
                </p>
            </div>

        </div>
    </div>
</div>

@endsection


{{-- !! This is for serious warnings or depricated methods --}}
{{-- ! This is for alerts --}}
{{-- & This is for notes --}}
{{-- todo This is for ToDo's --}}
{{-- * This is for suggestions --}}
{{-- ? This is for questions --}}
{{-- . This is for informative comments --}}
{{-- # This is for headings --}}
{{-- This is a normal comment --}}
{{-- // This is a commented out comment and will be deleted in furute versions --}}