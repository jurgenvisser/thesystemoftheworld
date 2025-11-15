@extends('layouts.app')

@section('title', 'Misie & Visie')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-1 lg:bg-h-backdrop-3 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-colorLight font-bold uppercase font-times ">Misie & Visie</h1>
                {{-- <h2 class="text-xl lg:text-4xl text-colorLight font-bold uppercase font-times">Begin vandaag met het nemen van actie</h2> --}}

            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Text Section (twee blokken) (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex flex-col gap-10">

            <!-- Missie Section (3/6) -->
            <div class="h-auto lg:h-full col-span-3">
                <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                    <!-- Content goes here -->
                    
                    <div class="">
                        <h1 class="mb-4 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Missie</h1>
        
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Mensen zitten vast in hun hoofd. Angst, twijfel, uitstel.
                        </p>
                        <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                            Niet omdat ze zwak zijn. Maar <span class="font-bold">omdat het systeem ze klein houdt</span>.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            The System is anders. Wij hebben <span class="font-bold">ons eigen systeem</span>, ons eigen <span class="font-bold">mentaal onderhoud</span>, gebouwd uit echte ervaring.
                        </p>
                        <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                            Wij accepteren geen excuses. Wij accepteren geen stilstand.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Bij The System bouw je <span class="font-bold">mentale kracht, structuur en discipline</span>.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Wij zijn er echt. Wij staan naast je.
                        </p>
                        <!-- Extra space between the text and the follow text -->
                        <p class="text-base lg:text-lg mt-8 px-4 lg:px-0">
                            <span class="font-bold">Sta op. Begin. Groei.</span>
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="!underline !decoration-colorPrimary animate-text-color theme-primary">@thesystemoftheworld</a>. <br>
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Discord: <a href="{{ $discordInviteLink }}" target="_blank" class="!underline !decoration-colorPrimary animate-text-color theme-primary">Join our community</a>.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Visie Section (3/6) -->
            <div class="h-auto lg:h-full col-span-3 flex">
                <div class="bg-colorPrimary/60 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-left ">
                <!-- Content goes here -->
        
                    <div class="">
                        <h1 class="mb-4 lg:mb-8 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Onze Visie</h1>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Je voelt je vast. Twijfelt. Durft niet te spreken.
                        </p>
                        <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                            Dat is geen zwakte. Dat betekent dat je <span class="font-bold">nog geen systeem hebt</span>.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Wij staan voor <span class="font-bold">mentale gezondheid</span>.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Voor een systeem dat werkt, niet voor mooie woorden.
                        </p>
                        <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                            Ik ben het levende bewijs: van chaos naar discipline, van twijfel naar focus.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Dit is voor jou, ook als je nooit durft te zeggen wat er speelt.
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0">
                            Bij The System leer je <span class="font-bold">rust, structuur en mentale kracht.</span>
                        </p>
                        <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">
                            Niet praten. <span class="font-bold">Doen. Groeien. Winnen.</span>
                        </p>
                        <p class="text-base lg:text-lg px-4 lg:px-0 font-bold">
                            Sta op. Bouw jezelf. Wij staan hier niet voor niets.
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm flex-1 w-full lg:text-2xl flex flex-col justify-start items-left text-colorLight p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-4 px-4 lg:px-0 text-2xl lg:text-4xl font-bold uppercase font-times">Ons Platform</h1>
    
                    <p class="text-base lg:text-lg px-4 lg:px-0">Dit is niet zomaar een platform.</p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">Dit is jouw <span class="font-bold">mentale onderhoudssysteem</span>.</p>

                    <p class="text-base lg:text-lg px-4 lg:px-0">Voor iedereen die vastzit.</p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">Voor iedereen die stilte in zijn hoofd mist.</p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">Voor iedereen die voelt dat het anders moet, maar niet weet hoe.</p>

                    <p class="text-base lg:text-lg px-4 lg:px-0">Je bent niet kapot.</p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">Je mist een systeem.</p>

                    <p class="text-base lg:text-lg px-4 lg:px-0">The System geeft je dat:</p>
                    <ul class="list-disc list-outside ml-5 mb-4 text-base lg:text-lg px-4 lg:px-0">
                        <li class="font-bold">Structuur</li>
                        <li class="font-bold">Discipline</li>
                        <li class="font-bold">Rust</li>
                        <li><span class="font-bold">Een Community die je omhoog trekt</span> in plaats van omlaag</li>
                        <li class="font-bold">begeleiding die levens redt</li>
                    </ul>

                    <p class="text-base lg:text-lg px-4 lg:px-0">Hier leer je niet wát je moet doen, maar hoe je eindelijk vooruitkomt.</p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">Niet met motivatiepraat, maar met dagelijkse stappen, bewijs en begeleiding.</p>

                    <p class="text-base lg:text-lg px-4 lg:px-0">Elke maand werk je aan je hoofd.</p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">Elke dag aan jezelf.</p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">Dat is onderhoud. Dat is The System.</p>

                    <p class="text-base lg:text-lg px-4 lg:px-0">Stop met overleven.</p>
                    <p class="text-base lg:text-lg mb-4 px-4 lg:px-0">Begin met bouwen.</p>
                    
                    <p class="text-base lg:text-lg px-4 lg:px-0 font-bold">Welkom bij The System.</p>
                    <p class="text-base lg:text-lg mb-12 px-4 lg:px-0 font-bold">Dit is waar je leven verandert.</p>

                    <!-- Extra space between the text and the follow text -->
                    <p class="text-base lg:text-lg px-4 lg:px-0">TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="!underline !decoration-colorPrimary animate-text-color theme-primary">@thesystemoftheworld</a>.</p>
                    <p class="text-base lg:text-lg px-4 lg:px-0">Discord: <a href="{{ $discordInviteLink }}" target="_blank" class="!underline !decoration-colorPrimary animate-text-color theme-primary">Join our community</a>.</p>
                    
                </div>

            </div>
        </div>


    </div>
</div>

@endsection