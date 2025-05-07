@extends('layouts.app')

@section('title', 'Over Ons')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-6 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Over Ons</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 responsive-height  flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Het Team van The System – Jouw Steun en Begeleiding</h1>
                    <p class="text-base lg:text-lg mb-6">
                        Bij The System bestaat ons team uit mensen die echt begrijpen wat je doormaakt. We hebben geen personeel die alleen theorieën delen; we zijn mensen die zelf ook hebben gevochten, geleerd en gegroeid. We hebben allemaal momenten gekend van onzekerheid, tegenslagen en het gevoel vast te zitten. En nu willen we onze ervaring en kennis met jou delen om je te helpen verder te komen.
                    </p>
                    <p class="text-base lg:text-lg">
                        Bij The System ben je nooit alleen. Ons team werkt elke dag hard om jou te voorzien van de tools, begeleiding en ondersteuning die je nodig hebt om te slagen. Wij zijn er om je te helpen groeien, ongeacht waar je nu staat.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">De Teams van The System</h1>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Social Media Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Ons team creëert en deelt dagelijks waardevolle content om je te inspireren en te motiveren. Ze bouwen een online community die jou helpt gefocust te blijven en vooruit te gaan.
                    </p>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Webdevelopment Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Onze tech-experts zorgen ervoor dat onze website altijd soepel werkt, zodat jij gemakkelijk toegang hebt tot alle tools en informatie die je nodig hebt om verder te komen.
                    </p>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Klantenservice Team</h2>
                    <p class="text-base lg:text-lg mb-8">
                        Ons supportteam staat klaar om je snel en persoonlijk te helpen via direct message of e-mail. Jij hoeft je geen zorgen te maken – we zorgen voor je.
                    </p>
                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Coaching Team</h2>
                    <p class="text-base lg:text-lg">
                        Onze coaches bieden maatwerkbegeleiding en helpen je door middel van persoonlijke coaching om je doelen te bereiken en obstakels te overwinnen.
                    </p>

                </div>
            </div>
        </div>

        <!-- Text Section (3/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 responsive-height text-left lg:text-justify">
                <div>
                    <h1 class="mb-8 text-2xl lg:text-4xl font-bold uppercase font-times">Onze AI collega - Lior</h1>

                    <p class="text-base lg:text-lg mb-8">
                        Bij The System draait alles om persoonlijke groei. Lior is onze neutrale AI-stem die zorgt voor duidelijke en toegankelijke video’s, zodat jij je kunt focussen op jouw ontwikkeling.
                    </p>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Wat doet Lior?</h2>
                    <p class="text-base lg:text-lg mb-2">
                        Lior is geen gewone stem. Het zorgt ervoor dat onze video’s:
                    </p>
                    <ul class="list-disc pl-8 mb-8 list-outside">
                        <li class="text-base lg:text-lg mb-2">Neutraal zijn en een breed publiek aanspreken.</li>
                        <li class="text-base lg:text-lg mb-2">De focus op inhoud houden, zodat jij kunt groeien.</li>
                        <li class="text-base lg:text-lg mb-2">Op de achtergrond blijven zonder invloed op persoonlijke interacties.</li>
                    </ul>

                    <p class="text-base lg:text-lg mb-8">
                        Het menselijke aspect blijft voorop staan. Al het maatwerk en de begeleiding komt van ons team, Lior brengt alleen de boodschap over.
                    </p>

                    <h2 class="mb-2 text-xl lg:text-2xl text-white font-bold uppercase font-times">Waarom Lior?</h2>
                    <p class="text-base lg:text-lg">
                        Lior maakt onze video’s betrouwbaar en toegankelijk, waardoor we jou dichter bij de essentie van The System brengen.
                    </p>
                </div>
            </div>
        </div>

        <!-- Text Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-4 lg:p-20 responsive-height text-left lg:text-justify">
                <!-- Content goes here -->
                
                <div class="">
                    <h2 class="mb-6 px-4 lg:px-0 text-2xl lg:text-4xl uppercase">
                        Wij geloven in jou – en wij geloven dat jij het in je hebt om meer te bereiken. Samen staan we <span class="font-bold">sterker</span>.
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