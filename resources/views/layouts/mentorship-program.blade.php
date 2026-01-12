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
                'price' => ['new'=> '0', 'original' => '29'],
                // 'contract' => 'Altijd',
                'features' => ['Toegang tot Discord Community', 'Dagdoelen & Dagtips', 'Dagelijkse check', 'Weekuitdagingen', 'Wekelijkse korte voorlichtingsvideo', 'Blueprint Demo'],
                'href' => $brevoFormLink,
                'type' => 'free',
                'modal_description' => [
                    'Instap is gratis, maar niet vrijblijvend.',
                    'Je krijgt toegang tot de community van The System en daarmee ook tot het ritme, de regels en de verantwoordelijkheid die daarbij horen.',
                    'Dit pakket vraagt initiatief. Je volgt dagdoelen, neemt deel aan uitdagingen en wordt geacht actief aanwezig te zijn. Wie alleen wil meekijken of afwachten, gaat hier snel afhaken.'
                ]
            ],
            [
                'id' => 'basis',
                'title' => 'Basis',
                'goal' => 'Mentale basis & ritme',
                'price' => ['new' => '50', 'original' => '59'],
                // 'contract' => 'Maandelijks opzegbaar',
                'features' => ['Alles van Instap', 'WhatsApp bereik voor jou vooruitgang (tot 18:00)', 'Persoonlijke schema\'s op maat (Beweging, Slaap, en meer...)', 'Toegang tot Blueprint omgeving', '1 Blueprint per maand', 'Blueprint mentorschap in groepsverband', 'Wekelijkse voorlichting (Livestream)'],
                // 'not-included' => ['1-op-1 gesprekken'],
                'href' => $brevoFormLink,
                'type' => 'paid',
                'modal_description' => [
                    'Basis is bedoeld voor mensen die willen bouwen aan structuur en mentale stabiliteit.',
                    'Je werkt zelfstandig met duidelijke kaders, vaste ritmes en toegang tot de Blueprint-omgeving.',
                    'Dit pakket vraagt eigen verantwoordelijkheid. Je krijgt richting en handvatten, maar geen constante aansporing of bevestiging. Vooruitgang ontstaat hier door doen, niet door afwachten.'
                ]
            ],
            [
                'id' => 'groei',
                'title' => 'Groei',
                'goal' => 'Structurele verandering',
                'price' => ['new' => '55', 'original' => '122'],
                // 'contract' => '3 maanden contract',
                'features' => ['Alles van Basis', 'WhatsApp bereik voor jou vooruitgang (tot 22:00)', 'Altijd begeleiding bij Blueprints', 'Crisisplan', 'Onderwerpen aandragen bij weekelijkse voorlichtingen', 'Eén 1-op-1 gesprek per maand (wachtlijst)', 'Videoideën aandragen'],
                // 'included' => [],
                'href' => $brevoFormLink,
                'type' => 'paid',
                'recommended' => true,
                'modal_description' => [
                    'Groei is voor mensen die vastlopen in terugkerende patronen en daar actief verandering in willen brengen.',
                    'Je werkt intensiever met de Blueprints en krijgt meer directe begeleiding en feedback tijdens dat proces.',
                    'Dit traject vraagt consistentie: afspraken nakomen, reflecteren op gedrag en verantwoordelijkheid nemen voor keuzes die je maakt.',
                    'Groei betekent hier niet praten over verandering, maar structureel ander gedrag laten zien over langere tijd.'
                ]
            ],
            [
                'id' => 'elite',
                'title' => 'Elite',
                'goal' => 'Diepe genezing & levensopbouw',
                'price' => ['new' => '70', 'original' => '349'],
                // 'contract' => '12 maanden contract',
                'features' => ['Alles van Groei', 'WhatsApp bereik voor crisis op recept (tot 00:00)', 'Bellen op recept', 'Alle Blueprints direct beschikbaar', '1-op-1 Blueprint mentorschap', 'Eén 1-op-1 belgesprek per maand (Waarde: €70)', '4 voortgangsgesprekken per maand'],
                'href' => $brevoFormLink,
                'type' => 'paid',
                'modal_description' => [
                    'Elite is geen upgrade. Het is een commitment.',
                    'Dit traject is bedoeld voor mensen die structureel hun leven willen heropbouwen en daar volledige verantwoordelijkheid voor nemen.',
                    'Je krijgt directe toegang, persoonlijke begeleiding en maximale betrokkenheid, maar alleen binnen een duidelijke werkstructuur en met actieve inzet van jouw kant.',
                    'Elite vraagt beschikbaarheid, eerlijkheid en het nakomen van afspraken. Dit is geen vangnet en geen reddingsboei.'
                ]
            ]
        ];

        $nonMember = [
            'title' => 'Het Alternatief',
            'description' => 'Dit is de standaard. Het pad van de minste weerstand. Geen kosten, maar de prijs die je betaalt is je toekomst.',
            'warning' => 'Waarschuwing: Comfortzone',
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
                <button data-open-plan="{{ $plan['id'] }}"
                        class="absolute top-4 right-4 z-30 text-zinc-500 hover:text-colorLight transition-colors p-1 rounded-full hover:bg-zinc-800"
                        aria-label="Meer informatie over {{ $plan['title'] }}">
                    <x-lucide-info class="w-5 h-5" />
                </button>

                @if ($isRecommended)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 bg-colorPrimary text-black px-3 py-1 text-xs font-bold uppercase tracking-widest">Meest gekozen</div>
                @endif

                <div class="glow-content h-full flex flex-col">
                    {{-- Header --}}
                    <div class="mb-4 text-center">
                        <h3 class="text-2xl font-bold text-white mb-1">{{ $plan['title'] }}</h3>
                        <p class="text-xs text-zinc-500 font-mono uppercase tracking-wide h-8 flex items-center justify-center">{{ $plan['goal'] }}</p>
                    </div>

                    {{-- Features List --}}
                    <ul class="flex-1 space-y-3 mb-8 text-left">
                        @foreach ($plan['features'] as $feature)
                            <li class="flex justify-start items-center gap-3 text-sm text-zinc-300 leading-snug">
                                <x-lucide-check class="w-4 h-4 {{ $isRecommended ? 'text-colorPrimary' : 'text-white' }} flex-shrink-0" />
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                        @if (isset($plan['not-included']))
                            <hr class="border-zinc-700 my-4" />
                            @foreach ($plan['not-included'] as $notInclude)
                                <li class="flex justify-start items-center gap-3 text-sm text-zinc-300 leading-snug">
                                    <x-lucide-x class="w-4 h-4 text-red-500 flex-shrink-0" />
                                    <span>{{ $notInclude }}</span>
                                </li>
                            @endforeach
                        @endif
                        @if (isset($plan['included']))
                            <hr class="border-zinc-700 my-4" />
                            @foreach ($plan['included'] as $include)
                                <li class="flex justify-start items-center gap-3 text-sm text-zinc-300 leading-snug">
                                    <x-lucide-check class="w-4 h-4 text-green-500 flex-shrink-0" />
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <!-- DE PRIJS VERGELIJKING -->
                    <div class="flex justify-center items-center flex-col">
                        @if(is_array($plan['price']))

                            @if(isset($plan['price']['original']))
                            <span class="text-base font-normal line-through text-zinc-400">Waarde: €{{ $plan['price']['original'] }}</span>
                            @endif

                            <div class="mb-6 flex items-center justify-center gap-3">

                                <div class="flex items-baseline justify-center gap-3">
                                    <span class="{{ $isRecommended ? 'text-3xl' : 'text-2xl' }} font-bold text-colorPrimary">
                                        @if($plan['price']['new'] == '0' || $plan['price']['new'] == 0)
                                            Gratis
                                        @else
                                            €{{ $plan['price']['new'] }}
                                        @endif
                                    </span>
                            
                                    @if($plan['price']['new'] != '0' && $plan['price']['new'] != 0)
                                        <span class="mb-1 self-end text-sm font-normal text-zinc-400">p/m</span>
                                    @endif
                                </div>

                                @if(isset($plan['price']['original']) && isset($plan['price']['new']) && $plan['price']['original'] > 0)
                                    @php
                                        // Bereken het percentage: (1 - (nieuw / oud)) * 100
                                        $discountAmount = (1 - ($plan['price']['new'] / $plan['price']['original'])) * 100;
                                        // Afronden naar het dichtstbijzijnde hele getal
                                        $roundedDiscount = round($discountAmount);
                                    @endphp

                                    @if($roundedDiscount > 0 && $roundedDiscount < 100)
                                        <span class="ml-2 inline-block rounded border border-colorPrimary/30 bg-colorPrimary/10 px-1.5 py-0.5 text-sm font-bold uppercase text-colorPrimary">
                                            ± {{ $roundedDiscount }}% KORTING
                                        </span>
                                    @endif
                                @elseif(isset($plan['price']['discount']))
                                    {{-- Fallback voor als er handmatig een discount string is meegegeven --}}
                                    <span class="ml-2 inline-block rounded border border-colorPrimary/30 bg-colorPrimary/10 px-1.5 py-0.5 text-sm font-bold uppercase text-colorPrimary">
                                        {{ $plan['price']['discount'] }}% KORTING
                                    </span>
                                @endif
                            @else
                                {{-- Fallback voor als prijs nog string is (voor zekerheid) --}}
                                <span class="text-3xl font-bold text-colorPrimary">{{ $plan['price'] }}</span>
                            @endif
                        </div>

                        @if(isset($plan['contract']))
                            <div class="text-xs text-zinc-400 mb-6">{{ $plan['contract'] }}</div>
                        @endif
                    </div>


                    {{-- Button --}}
                    <a href="{{ $plan['href'] }}" 
                       class="w-full text-center py-3 px-4 rounded-lg {{ $isRecommended ? 'font-bold' : 'font-normal' }} text-sm uppercase tracking-wider transition-all duration-200
                       {{ $isRecommended 
                          ? 'bg-colorPrimary text-black hover:bg-white hover:text-black shadow-lg shadow-colorPrimary/20' 
                          : 'bg-zinc-800 text-white hover:bg-zinc-700 border border-zinc-700' }}">
                        Kies {{ $plan['title'] }}
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
                    <p class="text-zinc-400 text-sm leading-relaxed">{{ $nonMember['description'] }}</p>
                    <div class="mt-6 hidden md:block">
                        <span class="text-xs font-mono text-red-900/60 uppercase">{{ $nonMember['warning'] }}</span>
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
                                    <p class="text-sm text-zinc-400 text-left text-justify" id="modalDescription">
                                        {{-- Dynamische Beschrijving --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 pt-0 sm:flex sm:flex-row-reverse">
                        <button type="button" data-close-modal class="inline-flex w-full justify-center rounded-md bg-colorPrimary px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-opacity-80 sm:w-auto transition-colors">
                            Sluiten
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>