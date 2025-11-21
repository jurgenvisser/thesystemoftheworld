@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

{{-- #Dump Session Data for API token retrieval debugging --}}
{{-- @php
    dd(session()->all());
@endphp --}}

@include('layouts.homepage-hero')


@include('layouts.social-proof')

<!-- SECTIE: The Problem (Grid Layout) -->
<section id="philosophy" class="bg-black px-12 py-20 md:py-32 border-b border-zinc-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-24 items-start">
        
        <!-- Left Side: Text Content -->
        <div class="space-y-8 md:sticky md:top-32">
            <h2 class="text-4xl md:text-6xl font-bold text-colorLight tracking-tight uppercase">
                De <span class="text-colorPrimary">chaos</span><br/>in je hoofd
            </h2>
            <p class="text-zinc-400 text-lg">
                Je kunt meer, maar je hoofd remt je af.
                Je hebt motivatie genoeg je mist orde.
            </p>
            <ul class="space-y-4 font-mono text-sm text-zinc-500 uppercase">
                <li class="flex items-center gap-3">
                    <x-lucide-x class="h-4 w-4 text-red-500 font-bold flex-shrink-0" /> Je hebt geen systeem
                </li>
                <li class="flex items-center gap-3">
                    <x-lucide-x class="h-4 w-4 text-red-500 font-bold flex-shrink-0" /> Je denkt negatief
                </li>
                <li class="flex items-center gap-3">
                    <x-lucide-x class="h-4 w-4 text-red-500 font-bold flex-shrink-0" /> Andermans verwachtingen
                </li>
            </ul>
        </div>

        <!-- Right Side: Feature Grid -->
        @php
            $features = [
                [
                    'icon' => 'Lock',
                    'title' => 'Mentale Vrijheid',
                    'desc' => 'Genoeg excuses. Genoeg twijfels. Pak je sleutel naar mentale vrijheid.'
                ],
                [
                    'icon' => 'Activity',
                    'title' => 'Bouw Veerkracht',
                    'desc' => 'Motivatie is tijdelijk. Discipline is eeuwig. Leer handelen ongeacht hoe je je voelt.'
                ],
                [
                    'icon' => 'Zap',
                    'title' => 'Breek Patronen',
                    'desc' => 'Stop met bang zijn. Doorbreek je angsten. Word sterker dan ooit.'
                ]
            ];
        @endphp

        <div class="grid gap-6">
            @foreach ($features as $feature)
                <div class="group p-8 border border-zinc-800 hover:border-colorPrimary hover:bg-zinc-900 transition-all duration-500">
                    @switch($feature['icon'])
                        @case('Lock')
                            <x-lucide-lock-open class="h-8 w-8 text-colorPrimary mb-6 flex-shrink-0" />
                            @break
                        @case('Activity')
                            <x-lucide-brain-circuit class="h-8 w-8 text-colorPrimary mb-6 flex-shrink-0" />
                            @break
                        @case('Zap')
                            <x-lucide-unlink class="h-8 w-8 text-colorPrimary mb-6 flex-shrink-0" />
                            @break
                    @endswitch
                    <h3 class="text-xl font-bold text-colorLight mb-3 uppercase tracking-wide">{{ $feature['title'] }}</h3>
                    <p class="text-zinc-400">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- @include('layouts.homepage-problem') --}}


{{-- Mentorship Program Section --}}
<section id="mentorship" class="py-16 px-12">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <span class="inline-block text-colorPrimary py-1 px-3 border border-zinc-700 rounded-full text-xs font-mono uppercase tracking-widest mb-6">
            Het Protocol
        </span>
        <h2 class="text-4xl md:text-5xl font-bold text-colorLight mb-6">MENTORSCHAP & COACHING</h2>
        <p class="text-zinc-400 text-lg">
            Mentoren die het pad al hebben gelopen. Gesprekken, structuur en begeleiding. Jij groeit, wij zorgen dat je doorgaat.
        </p>
    </div>

    <div class="grid md:grid-cols-4 gap-8 max-w-[90rem] mx-auto">
        @php
            $plans = [
                [
                    'title' => 'Instap',
                    'price' => 'Voor de bankzitters die geen vooruitgang willen',
                    'features' => ['Dezelfde angst', 'Nul begeleiding', 'Beperkte toegang tot Discord', 'Geen vooruitgang', 'Alleen Socialmedia', 'Motivatie zonder actie'],
                ],
                [
                    'title' => 'Basis',
                    'price' => 'Voor een laagdrempelige start, begin je hier',
                    'features' => ['Toegang tot Discord', 'Nieuwe Blueprint per oplossing', 'Dagchecks', 'Dagelijkse Opdrachten', 'Weekuitdagingen', 'Supportkanalen voor vragen'],
                ],
                [
                    'title' => 'Groei',
                    'price' => 'De mensen die echt willen groeien en veranderen',
                    'features' => ['Alles van Basis', '1-op-1 Coaching', 'Maandelijks nieuwe Blueprint', 'Besloten Community', 'Dagelijkse check-ins', 'Crisisondersteuning'],
                ],
                [
                    'title' => 'Elite',
                    'price' => 'Maak gebruik van alles wat The System te bieden heeft',
                    'features' => ['Alles van Basis en Groei', '1-op-1 Coaching 2x per week', 'Altijd begeleiding', 'Alle blueprints + toegang tot extra content', 'Groepsgesprekken met jouw elite', 'Exclusieve tips, video’s en tools ', 'Crisisondersteuning 24/7'],
                ],
            ];
        @endphp

        @foreach ($plans as $i => $plan)
            <div class="pakket-card relative p-8 border {{ $i === 2 ? 'border-colorPrimary bg-zinc-900' : 'border-zinc-800 hover:border-zinc-700' }} flex flex-col transition-all duration-300">
                @if ($i === 2)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-colorPrimary text-black px-3 py-1 text-xs font-bold uppercase tracking-widest">Aanbevolen</div>
                @endif

                <h3 class="text-2xl font-bold text-colorLight mb-2">{{ $plan['title'] }}</h3>
                <div class="text-sm font-mono text-zinc-500 uppercase mb-8">{{ $plan['price'] }}</div>

                <ul class="flex-1 space-y-4 mb-8">
                    @foreach ($plan['features'] as $feature)
                        <li class="flex items-center gap-3 text-sm text-zinc-300">
                            <div class="w-1.5 h-1.5 rounded-full {{ $i === 2 ? 'bg-colorPrimary' : 'bg-white' }}"></div>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>

                <a href="/coaching" class="w-full text-center inline-block py-3 px-6 {{ $i === 2 ? 'bg-colorPrimary text-black hover:bg-colorPrimary/80' : 'bg-black text-colorLight hover:bg-zinc-800' }}">
                    Beginnen
                </a>
            </div>
        @endforeach
    </div>
</section>
{{-- @include('layouts.mentorship-program') --}}


@include('layouts.homepage-quote')      

@endsection