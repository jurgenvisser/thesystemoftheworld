@extends('layouts.app')

@section('title', 'Kennis Maken') <!-- Set the title for this page --> 

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Coaching</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center hidden lg:block">jouw eerste stap begint hier</h2>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6 text-left">Waarom je hier bent</h2>
                <p class="text-base lg:text-lg mb-6">Je bent hier omdat je voelt dat het anders moet. Dat er meer in je zit. En dat je niet wéér motivatie wilt die verdwijnt. Je wilt iets dat blijft.</p>
                <p class="text-base lg:text-lg">Daarom is deze pagina er. Om jou vrijblijvend te laten kennismaken met The System. Zonder verplichtingen. Zonder druk.</p>
            </div>
        </div>
        
        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Wat je hier kunt doen</h2>
                <p class="text-base lg:text-lg mb-6">
                    Je hoeft nog niks te beslissen. Maar dit zijn je eerste opties: Stel je vraag aan ons team open en zonder oordeel.
                </p>
                <p class="text-base lg:text-lg mb-6">
                    Krijg direct uitleg over hoe The System jou helpt bouwen.
                </p>
                <p class="text-base lg:text-lg">
                    Laat je e-mailadres achter en we nemen persoonlijk contact met je op.
                </p>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Vertrouwen versterken</h2>
                <p class="text-base lg:text-lg">
                    Wij hebben zelf de twijfel meegemaakt. The System is er niet zomaar. Het is de plek waar je eerlijk ontdekt of dit bij je past. Omdat wij het ook hebben gedaan.
                </p>
                <div class="mt-6">
                    <a href="https://shop.thesystemoftheworld.com/b/coaching" class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800"">Plan je kennismaking</a>
                </div>
            </div>
        </div>
        
        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify shadow-md">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Toch nog twijfels?</h2>
                <p class="text-base lg:text-lg mb-6">
                    Je hoeft het niet nu te weten. Je hoeft alleen te voelen dat het anders moet. Daar begint het. Niet met zekerheid maar met eerlijk zijn tegen jezelf.
                </p>
                <p class="text-base lg:text-lg">                    
                    Lior legt je in 1 minuut uit waarom je niks te verliezen hebt. Bekijk de video. En beslis daarna zelf.
                </p>
            </div>
        </div>

        <!-- Video Section (3/6) -->
        <div class="bg-colorPrimary/60 relative h-[200px] lg:h-full col-span-3 flex">
            <!-- Fallback Text -->
            <div class="absolute inset-0 flex items-center justify-center z-0 pointer-events-none">
                <div class="text-white text-center">
                    <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times mb-6">Bekijk hier de video</h2>
                    <p class="text-base lg:text-lg mb-6">                    
                        Klik hier om de video om te bekijken.
                    </p>
                </div>
            </div>

            <!-- Video -->
            <video 
                src="/videos/MotivationalVideo.mov" 
                class="absolute inset-0 w-full h-full object-cover z-10" 
                loop 
                playsinline 
                controls>
                Your browser does not support the video tag.
            </video>
        </div>

    </div>
</div>

@endsection