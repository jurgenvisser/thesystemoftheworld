@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<!-- Main Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Text Content Section -->
            <div class="bg-systemYellow bg-opacity-60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 h-auto lg:h-[600px] w-96 lg:w-[1200px] lg:ml-8 text-justify leading-loose">
                <h1 class="text-4xl font-bold uppercase font-times mb-8">Homepage</h1>

                <!-- Text below the title -->
                <div>
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
    </div>
</div>


<div class="h-auto bg-yellow-400 m-0 py-10 space-y-10">

        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">
            <div>
                <div class="lg:w-[600px] bg-black hidden lg:block">
                    {!! file_get_contents(public_path('images/Logos/TheSystemFull.svg')) !!}
                </div>
            </div>

            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-justify leading-loose">
                <h1 class="text-4xl font-bold uppercase font-times mb-8">Coming Soon</h1>

                <!-- Text below the title -->
                <div>
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
                </div>
            </div>
        </div>


        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">
            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 h-auto w-96 lg:w-[800px] lg:ml-8 text-justify leading-loose">
                
                <!-- Text below the title -->
                <div>
                    <h1 class="text-4xl font-bold uppercase font-times mb-8 px-4 lg:px-0">Welkom bij onze website</h1>
                    <p class="text-lg mb-6 px-4 lg:px-0">Dit is een plek waar innovatie en creativiteit elkaar ontmoeten. Ons team is vastbesloten om krachtige oplossingen te leveren die jouw bedrijf helpen groeien. Of je nu op zoek bent naar een strak ontwerp, een krachtige app, of strategisch advies, wij hebben de vaardigheden en expertise om jouw visie tot leven te brengen.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Onze oplossingen zijn op maat gemaakt om aan jouw specifieke behoeften te voldoen. Wij geloven in samenwerking, transparantie en een klantgerichte aanpak om producten te creëren die niet alleen werken, maar ook inspireren. Laat ons jouw project naar het volgende niveau tillen met onze geavanceerde ontwerpen en ontwikkelingsstrategieën.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Wij werken met verschillende industrieën, waaronder technologie, onderwijs, gezondheidszorg en entertainment. Ongeacht de omvang of schaal van jouw project, we kunnen je helpen om de uitdagingen van modern zakendoen te navigeren met creatieve en praktische oplossingen die resultaat opleveren.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Neem vandaag nog contact met ons op om te ontdekken hoe wij je kunnen helpen bij het bereiken van je doelen. We kijken ernaar uit om het gesprek met je aan te gaan en samen te werken om jouw ideeën tot leven te brengen!</p>
                </div>
            </div>
        </div>
        
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">
            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 h-auto w-96 lg:w-[1200px] lg:ml-8 text-justify leading-loose">
                
                <!-- Text below the title -->
                <div>
                    <h1 class="text-4xl font-bold uppercase font-times mb-8 px-4 lg:px-0">Ontdek de toekomst van technologie</h1>
                    <p class="text-lg mb-6 px-4 lg:px-0">Onze visie is om technologie te gebruiken als een kracht voor verandering. We streven ernaar om digitale ervaringen te creëren die mensen verbinden, bedrijven transformeren en de wereld vooruit helpen. We zijn gepassioneerd over het ontwikkelen van producten die zowel nuttig als innovatief zijn, met een focus op het verbeteren van de gebruikerservaring en het bevorderen van duurzame groei.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">We werken samen met bedrijven in uiteenlopende sectoren, van start-ups tot gevestigde merken, en helpen hen bij het realiseren van hun digitale ambities. Of het nu gaat om het ontwikkelen van een nieuwe app, het vernieuwen van een website, of het implementeren van strategische digitale oplossingen, wij staan klaar om te helpen.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Onze aanpak is altijd op maat. We luisteren naar je behoeften, begrijpen je doelen en creëren een plan dat je naar succes leidt. We zijn trots op de langdurige relaties die we hebben opgebouwd met onze klanten, en we geloven dat echte innovatie ontstaat wanneer we samenwerken.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Neem contact met ons op om te zien hoe we samen kunnen bouwen aan de toekomst. De mogelijkheden zijn eindeloos, en wij zijn er om je te helpen ze te benutten.</p>
                </div>
            </div>
        </div>
        
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">
            <!-- Text Content Section -->
            <div class="bg-black text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 h-auto w-96 lg:w-[1400px] lg:ml-8 text-justify leading-loose">
                
                <!-- Text below the title -->
                <div>
                    <h1 class="text-4xl font-bold uppercase font-times mb-8 px-4 lg:px-0">Innovatie is de sleutel tot succes</h1>
                    <p class="text-lg mb-6 px-4 lg:px-0">We leven in een snel veranderende wereld waar innovatie het verschil maakt tussen succes en stilstand. Bij ons draait alles om het ontwikkelen van baanbrekende oplossingen die bedrijven in staat stellen om vooruit te denken en vooruit te komen. Of het nu gaat om het automatiseren van processen, het verbeteren van de klantbeleving, of het implementeren van nieuwe technologieën, wij hebben de expertise om je te helpen.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Wij geloven dat innovatie niet alleen gaat om technologie, maar ook om creatief denken en het zoeken naar nieuwe manieren om waarde te leveren. Het is onze missie om samen met onze klanten te werken aan het vinden van oplossingen die niet alleen impact hebben, maar ook duurzaam zijn op de lange termijn.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Als je op zoek bent naar een partner die begrijpt wat er nodig is om te innoveren, dan ben je bij ons aan het juiste adres. Wij bieden de tools, het inzicht en de strategieën die je nodig hebt om je doelen te bereiken. We kijken ernaar uit om je te helpen je visie te realiseren en een echte impact te maken.</p>
                    <p class="text-lg mb-6 px-4 lg:px-0">Laat ons je helpen om de volgende stap te zetten. Neem contact met ons op en ontdek hoe wij samen jouw succes kunnen vergroten.</p>
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