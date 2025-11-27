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
            <div class="glow-card relative p-8 border {{ $i === 2 ? 'outline outline-2 -outline-offset-1 outline-colorPrimary bg-zinc-900' : 'border-zinc-800 hover:border-zinc-700' }} flex flex-col transition-all duration-300"
            style="{{ $i === 2 ? '--default-opacity: 0.3; --disable-border-glow: 1;' : '' }}">
                <div class="glow-blob"></div>
                
                @if ($i === 2)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 bg-colorPrimary text-black px-3 py-1 text-xs font-bold uppercase tracking-widest">Aanbevolen</div>
                @endif

                <div class="glow-content h-full flex flex-col">
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
            </div>
        @endforeach
    </div>
</section>