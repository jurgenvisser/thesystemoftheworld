@extends('layouts.app')

@section('title', 'Social Media')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                <h1 class="text-4xl font-bold uppercase font-times mb-8">Social Media</h1>

                <!-- Text below the title -->
                <div>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        The System is meer dan alleen een platform. Het is een community. Een groep mensen die vastbesloten zijn om hun dromen waar te maken en een verschil te maken in de wereld.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Op onze social media kanalen vind je niet alleen updates, maar ook inspiratie, tips en verhalen van gelijkgestemde mensen die hetzelfde pad bewandelen.
                    </p>
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Volg ons en maak deel uit van de beweging. Jouw verhaal kan het volgende grote verhaal zijn!
                    </p>
                </div>

                <!-- Extra space between the text and the follow text -->
                <p class="text-base lg:text-lg mt-12 px-4 lg:px-0">
                    Volg The System voor meer! <br>
                    TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-systemYellow">@thesystemoftheworld</a>.
                </p>
            </div>

        </div>
    </div>
</div>

@endsection