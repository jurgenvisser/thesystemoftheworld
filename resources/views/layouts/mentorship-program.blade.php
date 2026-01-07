{{-- Mentorship Program Section --}}
{{-- <section id="mentorship" class="py-16 px-12">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <span class="inline-block text-colorPrimary py-1 px-3 border border-zinc-700 rounded-full text-xs font-mono uppercase tracking-widest mb-6">
            Het Protocol
        </span>
        <h2 class="text-4xl md:text-5xl font-bold text-colorLight mb-6">MENTORSCHAP</h2>
        <p class="text-zinc-400 text-lg">
            Mentoren die het pad al hebben gelopen. Gesprekken, structuur en begeleiding. Jij groeit, wij zorgen dat je doorgaat. Kies jouw pad. Van gratis start tot elite begeleiding.
        </p>
    </div>

    <div class="grid md:grid-cols-5 gap-8 max-w-[90rem] mx-auto">
        @php
            $plans = [
                [
                    'title' => 'Instap',
                    'goal' => 'Voor iedereen. Altijd gratis. De fundering van mentale gezondheid',
                    'price' => 'Gratis',
                    'contract' => 'Altijd Beschikbaar',
                    // 'features' => ['Elke dag dezelfde excuses', 'Angst die blijft regeren', 'Geen begeleiding, geen systeem', 'Geen toegang, nul diepgang', 'Alleen social media, geen omgeving', 'Motivatievideo’s zonder actie', 'Tijd gaat voorbij, jij staat stil'],
                    'features' => ['Toegang tot Discord', 'Dagelijkse dagcheck (verplicht)', 'Dagdoelen & dagingtips', 'Weekuitdagingen', 'Supportkanalen', 'Wekelijkse voorlichting van Quinn', 'Wekelijkse voorlichting', 'Verbinding & structuur'],
                    'button' => 'Beginnen',
                    'href' => $discordInviteLink,
                ],
                [
                    'title' => 'Basis',
                    'goal' => 'Gericht werken aan je mentale gezondheid, stap voor stap',
                    'price' => '€50 p/m',
                    'contract' => 'Maandelijks opzegbaar',
                    // 'features' => ['Toegang tot alle kanalen', 'Dagelijkse dagcheck (verplicht)', 'Dagdoelen & dagingtips', 'Weekuitdagingen', 'Supportkanalen', 'Wekelijkse voorlichting van Quinn', 'Live vragenmomenten', 'Kans op maandelijkse blueprint-selecties'],
                    'features' => ['Alles van Instap', 'Voorrang bij blueprint-selecties', 'Extra verdiepende content', 'Uitgebreidere voorlichtingen', 'Mogelijkheid om 1x per week een gesprek aan te vragen (wachtlijst)', 'Extra opdrachten & mentale trainingen'],
                    'button' => 'Beginnen',
                    'href' => $discordInviteLink,
                ],
                [
                    'title' => 'Groei',
                    'goal' => 'Mentale stabiliteit, focus en structurele verandering',
                    'price' => 'Vanaf €48 p/m',
                    'contract' => '3 tot 6 maanden',
                    // 'features' => ['Alles van Basis', 'Voorrang bij blueprint-selecties', 'Extra verdiepende content', 'Uitgebreidere voorlichtingen', 'Mogelijkheid om 1x per week een gesprek aan te vragen (wachtlijst)', 'Extra opdrachten & mentale trainingen'],
                    'features' => ['Alles van Instap en Basis', 'Voorrang op gesprekken en trajecten', 'Toegang tot alle blueprints', 'Exclusieve sessies & groepsgesprekken', 'Extra tools, video’s en mentale programma’s', 'Nauwere betrokkenheid bij The System', 'Mogelijkheid tot intensievere begeleiding'],
                    'button' => 'Beginnen',
                    'href' => $discordInviteLink,
                ],
                [
                    'title' => 'Elite',
                    'goal' => 'Diepe mentale genezing, zelfstandigheid en levensopbouw',
                    'price' => 'Vanaf €45 p/m',
                    'contract' => '12 tot 36 maanden',
                    'features' => ['Alles van Instap, Basis en Groei', 'Voorrang op gesprekken en trajecten', 'Toegang tot alle blueprints', 'Exclusieve sessies & groepsgesprekken', 'Extra tools, video’s en mentale programma’s', 'Nauwere betrokkenheid bij The System', 'Mogelijkheid tot intensievere begeleiding'],
                    'button' => 'Beginnen',
                    'href' => $discordInviteLink,
                ],
                [
                    'title' => 'Niet-Lid',
                    'goal' => 'Voor de bankzitters die klagen, scrollen en niets veranderen',
                    'price' => '',
                    'contract' => '',
                    'features' => ['Niks van alle pakketten', 'Elke dag dezelfde excuses', 'Angst die blijft regeren', 'Geen begeleiding, geen systeem', 'Geen toegang, nul diepgang', 'Alleen social media, geen omgeving', 'Motivatievideo’s zonder actie', 'Tijd gaat voorbij, jij staat stil'],
                    'button' => 'Stop met klagen',
                    'href' => '/',
                ],
            ];

            $nonMember = [
                'title' => 'Het Alternatief (Niet-Lid)',
                'features' => ['Elke dag dezelfde excuses', 'Angst die blijft regeren', 'Geen begeleiding', 'Geen toegang', 'Alleen social media scrollen', 'Geen actie, alleen dromen', 'Tijd gaat voorbij, jij staat stil']
            ];

            $selectedPlanIndex = 2; // Groei plan
        @endphp

        @foreach ($plans as $i => $plan)
            <div class="glow-card relative p-8 border {{ $i === $selectedPlanIndex ? 'outline outline-2 -outline-offset-1 outline-colorPrimary bg-zinc-900' : 'border-zinc-800 hover:border-zinc-700' }} flex flex-col transition-all duration-300"
            style="{{ $i === $selectedPlanIndex ? '--default-opacity: 0.3; --disable-border-glow: 1;' : '' }}">
                <div class="glow-blob"></div>
                
                @if ($i === $selectedPlanIndex)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 bg-colorPrimary text-black px-3 py-1 text-xs font-bold uppercase tracking-widest">Aanbevolen</div>
                @endif

                <div class="glow-content h-full flex flex-col">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-colorLight">{{ $plan['title'] }} </h3>
                        <span class="text-sm font-mono text-zinc-500 uppercasefont-normal">{{ $plan['price'] }}</span>
                    </div>
                    <div class="text-sm text-zinc-500 mb-4">{{ $plan['goal'] }}</div>
                    <ul class="flex-1 space-y-4 mb-8">
                        @foreach ($plan['features'] as $feature)
                        <li class="flex items-center gap-3 text-sm text-zinc-300">
                            <div class="w-1.5 h-1.5 rounded-full {{ $i === $selectedPlanIndex ? 'bg-colorPrimary' : 'bg-white' }}"></div>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-sm font-mono text-zinc-500 mb-4 justify-end">{{ $plan['contract'] }}</div>
                    <a href="{{ $plan['href'] }}" class="w-full text-center inline-block py-3 px-6 {{ $i === $selectedPlanIndex ? 'bg-colorPrimary text-black hover:bg-colorPrimary/80' : 'bg-black text-colorLight hover:bg-colorPrimary/10' }}">
                        {{ $plan['button'] }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</section> --}}


<section id="mentorship" class="py-16 px-4 md:px-12">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <span class="inline-block text-colorPrimary py-1 px-3 border border-zinc-700 rounded-full text-xs font-mono uppercase tracking-widest mb-6">
            Het Protocol
        </span>
        <h2 class="text-4xl md:text-5xl font-bold text-colorLight mb-6">MENTORSCHAP</h2>
        <p class="text-zinc-400 text-lg">
            Mentoren die het pad al hebben gelopen. Gesprekken, structuur en begeleiding. Jij groeit, wij zorgen dat je doorgaat. Kies jouw pad. Van gratis start tot elite begeleiding.
        </p>
    </div>

    @php

        $allPlans = [
            [
                'id' => 'instap', // Unieke ID voor JS
                'title' => 'Instap',
                'goal' => 'Bewustwording & verbinding',
                'price' => 'Gratis',
                'contract' => 'Altijd',
                'features' => ['Toegang tot Discord', 'Dagdoelen', 'Dagelijkse dagcheck', 'Weekuitdagingen', 'Supportkanalen', 'Wekelijkse korte voorlichting', 'Verbinding & structuur', 'Blueprint gratis testen'],
                'button' => 'Start Instap',
                'href' => $discordInviteLink,
                'type' => 'free',
                // Extra info voor de modal
                'modal_description' => [
                    'Het Instap-pakket is perfect om kennis te maken met onze community en werkwijze.',
                    'Je krijgt direct toegang tot gelijkgestemden en basisstructuur zonder kosten.'
                ],
                'modal_details' => [
                    'Toegang: Direct en onbeperkt',
                    'Focus: Kennismaking en basisritme',
                    'Support: Community-based'
                ]
            ],
            [
                'id' => 'basis',
                'title' => 'Basis',
                'goal' => 'Mentale basis & ritme',
                'price' => '€60 p/m',
                'contract' => 'Maandelijks opzegbaar',
                'features' => ['Alles van Instap', 'Voorrang blueprints', 'Extra content', 'Uitgebreide wekelijkse voorlichting', 'Extra trainingen'],
                'not-included' => ['1-op-1 gesprekken'],
                'button' => 'Kies Basis',
                'href' => $discordInviteLink,
                'type' => 'paid',
                'modal_description' => [
                    'Met Basis leg je een serieus fundament.',
                    'Je krijgt toegang tot diepgaandere content en voorrang, ideaal voor wie zelfstandig aan de slag wil met extra handvatten.'
                ],
                'modal_details' => [
                    'Toegang: Uitgebreide content bibliotheek',
                    'Focus: Zelfontwikkeling met extra tools',
                    'Support: Wekelijkse groepssessies'
                ]
            ],
            [
                'id' => 'groei',
                'title' => 'Groei',
                'goal' => 'Structurele verandering',
                'price' => 'Vanaf €50 p/m',
                'contract' => '3 maanden contract',
                'features' => ['Alles van Basis', 'Voorrang gesprekken', 'Alle blueprints', 'Exclusieve sessies', 'Extra tools & video’s', 'Nauwere betrokkenheid', 'Intensievere begeleiding'],
                'included' => ['1-op-1 gesprekken (wachtlijst)'],
                'button' => 'Kies Groei',
                'href' => $discordInviteLink,
                'type' => 'paid',
                'recommended' => true,
                'modal_description' => [
                    'Groei is voor degenen die klaar zijn voor de volgende stap.',
                    'Met persoonlijke aandacht en toegang tot al onze blueprints ga je structureel aan de slag met je doelen.'
                ],
                'modal_details' => [
                    'Toegang: Volledige blueprint database',
                    'Focus: Doorbreken van patronen',
                    'Support: Mogelijkheid tot 1-op-1 (wachtlijst)'
                ]
            ],
            [
                'id' => 'elite',
                'title' => 'Elite',
                'goal' => 'Diepe genezing & levensopbouw',
                'price' => 'Vanaf €40 p/m',
                'contract' => '12 maanden contract',
                'features' => ['Alles van Groei', 'Hoogste prioriteit', '1-op-1 Mentorschap', 'VIP sessies', 'Toegang tot alles', 'Persoonlijke roadmap'],
                'button' => 'Kies Elite',
                'href' => $discordInviteLink,
                'type' => 'paid',
                'modal_description' => [
                    'Elite is het hoogste niveau binnen The System. Je krijgt persoonlijke 1-op-1 begeleiding, een systeem op maat en volledige toegang tot alles wat nodig is voor blijvende mentale stabiliteit en discipline.',
                    'Dit traject is voor wie verantwoordelijkheid neemt en geen halve stappen zet.'
                ],
                'modal_details' => [
                    'Begeleiding: Persoonlijk 1-op-1 mentorschap',
                    'Structuur: Individuele roadmap afgestemd op jouw situatie',
                    'Toegang: Volledige VIP-toegang tot The System',
                    'Doel: Duurzame mentale kracht en levensstructuur'
                ]
            ]
        ];

        $nonMember = [
            'title' => 'Het Alternatief (Niet-Lid)',
            'features' => ['Elke dag dezelfde excuses', 'Angst die blijft regeren', 'Geen begeleiding', 'Geen toegang', 'Alleen social media scrollen', 'Geen actie, alleen dromen', 'Tijd gaat voorbij, jij staat stil']
        ];
    @endphp

    {{-- Data doorgeven aan JS --}}
    <script>
        window.planData = @json($allPlans);
    </script>

    {{-- DE 4 ECHTE PLANNEN IN EEN GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 max-w-[90rem] mx-auto mb-16">
        @foreach ($allPlans as $plan)
            @php
                $isRecommended = isset($plan['recommended']) && $plan['recommended'];
            @endphp

                <div class="glow-card relative p-8 border flex flex-col transition-all duration-300 h-full
                        {{ $isRecommended ? 'outline outline-2 -outline-offset-1 outline-colorPrimary bg-zinc-900 z-10 scale-105 md:scale-100 xl:scale-105 shadow-2xl' : 'border-zinc-800 hover:border-zinc-700 bg-zinc-900/40' }}"
                 style="{{ $isRecommended ? '--default-opacity: 0.3; --disable-border-glow: 1;' : '' }}">
                
                <div class="glow-blob"></div>
                
                {{-- Info Icoon (Rechtsboven) --}}
                <button onclick="openInfoModal('{{ $plan['id'] }}')" 
                        class="absolute top-4 right-4 z-30 text-zinc-500 hover:text-colorLight transition-colors p-1 rounded-full hover:bg-zinc-800"
                        aria-label="Meer informatie over {{ $plan['title'] }}">
                    <x-lucide-info class="w-5 h-5" />
                </button>

                @if ($isRecommended)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 bg-colorPrimary text-black px-3 py-1 text-xs font-bold uppercase tracking-widest">Meest gekozen</div>
                @endif

                <div class="glow-content h-full flex flex-col">
                    {{-- Header --}}
                    <div class="mb-6 text-center">
                        <h3 class="text-2xl font-bold text-white mb-1">{{ $plan['title'] }}</h3>
                        <p class="text-xs text-zinc-500 font-mono uppercase tracking-wide mb-4 h-8 flex items-center justify-center">{{ $plan['goal'] }}</p>
                        <div class="{{ $isRecommended ? 'text-3xl' : 'text-2xl' }} font-bold text-colorPrimary">{{ $plan['price'] }}</div>
                        <div class="text-xs text-zinc-600 mt-1">{{ $plan['contract'] }}</div>
                    </div>

                    {{-- Features List --}}
                    <ul class="flex-1 space-y-3 mb-8 text-left">
                        @foreach ($plan['features'] as $feature)
                            <li class="flex justify-start items-center gap-3 text-sm text-zinc-300 leading-snug">
                                <x-lucide-check class="w-4 h-4 {{ $isRecommended ? 'text-colorPrimary' : 'text-white' }} flex-shrink-0" />
                                {{-- <div class="mt-1.5 w-1.5 h-1.5 rounded-full flex-shrink-0 {{ $isRecommended ? 'bg-colorPrimary' : 'bg-white' }}"></div> --}}
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                        @if (isset($plan['not-included']))
                            <hr class="border-zinc-700 my-4" />
                            @foreach ($plan['not-included'] as $notInclude)
                                <li class="flex justify-start items-center gap-3 text-sm text-zinc-300 leading-snug">
                                    <x-lucide-x class="w-4 h-4 text-red-500 flex-shrink-0" />
                                    {{-- <div class="mt-1.5 w-1.5 h-1.5 rounded-full flex-shrink-0 {{ $isRecommended ? 'bg-colorPrimary' : 'bg-white' }}"></div> --}}
                                    <span>{{ $notInclude }}</span>
                                </li>
                            @endforeach
                        @endif
                        @if (isset($plan['included']))
                            <hr class="border-zinc-700 my-4" />
                            @foreach ($plan['included'] as $include)
                                <li class="flex justify-start items-center gap-3 text-sm text-zinc-300 leading-snug">
                                    <x-lucide-check class="w-4 h-4 text-green-500 flex-shrink-0" />
                                    {{-- <div class="mt-1.5 w-1.5 h-1.5 rounded-full flex-shrink-0 {{ $isRecommended ? 'bg-colorPrimary' : 'bg-white' }}"></div> --}}
                                    <span>{{ $include }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    {{-- Button --}}
                    <a href="{{ $plan['href'] }}" 
                       class="w-full text-center py-3 px-4 rounded-lg {{ $isRecommended ? 'font-bold' : 'font-normal' }} text-sm uppercase tracking-wider transition-all duration-200
                       {{ $isRecommended 
                          ? 'bg-colorPrimary text-black hover:bg-white hover:text-black shadow-lg shadow-colorPrimary/20' 
                          : 'bg-zinc-800 text-white hover:bg-zinc-700 border border-zinc-700' }}">
                        {{ $plan['button'] }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- HET "NIET-LID" ANTI-PLAN (Horizontaal Blok) --}}
    <div class="max-w-5xl mx-auto">
        <div class="glow-card glow-error relative p-8 md:p-10 overflow-hidden group">
            {{-- Achtergrond gloed voor het 'gevaar' effect --}}
            <div class="glow-content absolute inset-0 bg-gradient-to-r from-transparent via-red-900/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center md:items-start gap-8">
                {{-- Linker kant: Titel en confrontatie --}}
                <div class="md:w-1/3 text-center md:text-left">
                    <h3 class="text-2xl font-bold text-red-500 mb-2 uppercase tracking-wide flex items-center justify-center md:justify-start gap-2">
                        <x-lucide-x-circle class="w-6 h-6" />
                        {{ $nonMember['title'] }}
                    </h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Dit is de standaard. Het pad van de minste weerstand. 
                        Geen kosten, maar de prijs die je betaalt is je toekomst.
                    </p>
                    <div class="mt-6 hidden md:block">
                        <span class="text-xs font-mono text-red-900/60 uppercase">Waarschuwing: Comfortzone</span>
                    </div>
                </div>

                {{-- Rechter kant: De pijnlijke features in 2 kolommen --}}
                <div class="md:w-2/3 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($nonMember['features'] as $feature)
                            <div class="flex items-center gap-3 text-sm text-zinc-500 group-hover:text-red-400/80 transition-colors">
                                <x-lucide-x class="w-4 h-4 text-red-900 flex-shrink-0" />
                                <span>{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL STRUCTUUR --}}
    <div id="infoModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                {{-- Modal Panel --}}
                <div class="relative transform overflow-hidden rounded-lg bg-zinc-900 border border-zinc-700 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" id="modalPanel">
                    
                    <div class="bg-zinc-900 px-4 py-5 sm:p-6">
                        <div class="sm:flex sm:items-start">
                            <div class="text-left w-full sm:mt-0">
                                <h3 class="text-2xl font-bold leading-6 text-colorLight mb-4" id="modalTitle">
                                    {{-- Dynamische Titel --}}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-zinc-400 mb-6 text-left" id="modalDescription">
                                        {{-- Dynamische Beschrijving --}}
                                    </p>
                                    
                                    <div class="bg-zinc-800/50 rounded-md p-4 border border-zinc-700">
                                        <h4 class="text-sm font-bold text-colorPrimary mb-3 uppercase tracking-wider text-left">Details</h4>
                                        <ul class="space-y-2 text-sm text-zinc-300 font-mono text-left" id="modalDetails">
                                            {{-- Dynamische Details Lijst --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 pt-0 sm:flex sm:flex-row-reverse">
                        <button type="button" onclick="closeInfoModal()" class="inline-flex w-full justify-center rounded-md bg-colorPrimary px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-opacity-80 sm:w-auto transition-colors">
                            Sluiten
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

{{-- JAVASCRIPT VOOR MODAL LOGICA --}}
<script>
    // Elementen selecteren
    const modal = document.getElementById('infoModal');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');
    const titleEl = document.getElementById('modalTitle');
    const descEl = document.getElementById('modalDescription');
    const detailsEl = document.getElementById('modalDetails');

    function openInfoModal(planId) {
        // Data ophalen
        const plan = window.planData.find(p => p.id === planId);
        if (!plan) return;

        // Content vullen
        titleEl.textContent = plan.title;
        descEl.innerHTML = '';

        if (Array.isArray(plan.modal_description)) {
            plan.modal_description.forEach(paragraph => {
                const p = document.createElement('p');
                p.className = 'mb-4 last:mb-0';
                p.textContent = paragraph;
                descEl.appendChild(p);
            });
        } else if (plan.modal_description) {
            const p = document.createElement('p');
            p.textContent = plan.modal_description;
            descEl.appendChild(p);
        } else {
            descEl.textContent = 'Geen extra informatie beschikbaar.';
        }

        // Details lijst leegmaken en vullen
        detailsEl.innerHTML = '';
        if (plan.modal_details) {
            plan.modal_details.forEach(detail => {
                const li = document.createElement('li');
                li.className = 'flex items-center gap-2';
                li.innerHTML = `<span class="w-1.5 h-1.5 rounded-full bg-zinc-500"></span> ${detail}`;
                detailsEl.appendChild(li);
            });
        }

        // Modal tonen (eerst hidden weghalen)
        modal.classList.remove('hidden');

        // Kleine timeout voor de transitie (zodat de browser de render update)
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }, 10);
    }

    function closeInfoModal() {
        // Transities terugdraaien
        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

        // Wachten op transitie einde voordat we hidden toevoegen
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300); // 300ms is de standaard duration in Tailwind transitions vaak
    }

    // Sluiten als je buiten de modal klikt
    modal.addEventListener('click', (e) => {
        if (e.target === backdrop || e.target.closest('.fixed.inset-0.z-10')) {
             // Check of er niet op het panel zelf geklikt wordt is lastig met deze structuur, 
             // makkelijker is checken of e.target == de backdrop container wrapper
        }
    });
    
    // Betere click-outside implementatie voor deze structuur
    backdrop.addEventListener('click', closeInfoModal);
</script>