{{-- Mentorship Program Section --}}
<section id="mentorship" class="py-16 px-12">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <span class="inline-block text-colorLight py-1 px-3 border border-zinc-700 rounded-full text-xs font-mono uppercase tracking-widest mb-6">
            Het Protocol
        </span>
        <h2 class="text-4xl md:text-5xl font-bold text-colorLight mb-6">MENTORSCHAP & COACHING</h2>
        <p class="text-zinc-400 text-lg">
            Persoonlijk mentorschap van hen die de chaos hebben overleefd. Geen theorie—alleen structuur, gesprekken en begeleiding.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $plans = [
                [
                    'title' => 'Het Ontwaken',
                    'price' => 'Basis',
                    'features' => ['Wekelijkse Groepsgesprekken', 'Toegang tot Discord', 'Dagelijkse Opdrachten'],
                ],
                [
                    'title' => 'De Klim',
                    'price' => 'Groei',
                    'features' => ['1-op-1 Coaching', 'Op Maat Gemaakt Plan', '24/7 Verantwoording', 'Besloten Community'],
                ],
                [
                    'title' => 'De Top',
                    'price' => 'Elite',
                    'features' => ['Dagelijks Direct Contact', 'Business Strategie', 'Levensherstructurering', 'Fysieke Retraites'],
                ],
            ];
        @endphp

        @foreach ($plans as $i => $plan)
            <div class="relative p-8 border {{ $i === 1 ? 'border-colorPrimary bg-zinc-900' : 'border-zinc-800 hover:border-zinc-700' }} flex flex-col transition-all duration-300">
                @if ($i === 1)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-colorPrimary text-black px-3 py-1 text-xs font-bold uppercase tracking-widest">Aanbevolen</div>
                @endif

                <h3 class="text-2xl font-bold text-colorLight mb-2">{{ $plan['title'] }}</h3>
                <div class="text-sm font-mono text-zinc-500 uppercase mb-8">{{ $plan['price'] }} Tier</div>

                <ul class="flex-1 space-y-4 mb-8">
                    @foreach ($plan['features'] as $feature)
                        <li class="flex items-center gap-3 text-sm text-zinc-300">
                            <div class="w-1.5 h-1.5 rounded-full {{ $i === 1 ? 'bg-colorPrimary' : 'bg-white' }}"></div>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>

                <a href="/coaching" class="w-full text-center inline-block py-3 px-6 {{ $i === 1 ? 'bg-colorPrimary text-black hover:bg-colorPrimary/80' : 'bg-black text-colorLight hover:bg-zinc-800' }}">
                    Beginnen
                </a>
            </div>
        @endforeach
    </div>
</section>