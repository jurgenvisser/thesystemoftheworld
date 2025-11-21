<!-- SECTIE: The Problem (Grid Layout) -->
<section id="philosophy" class="bg-black px-12 py-20 md:py-32 border-b border-zinc-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-24 items-start">
        
        <!-- Left Side: Text Content -->
        <div class="space-y-8 md:sticky md:top-32">
            <h2 class="text-4xl md:text-6xl font-bold text-colorLight tracking-tight uppercase">
                De <span class="text-colorPrimary">chaos</span><br/>in je hoofd
            </h2>
            <p class="text-zinc-400 text-lg">
                De meeste mensen leven in een roes. Je hebt potentieel, maar geen richting. 
                Je hebt verlangen, maar geen discipline. Je wacht op een teken dat nooit komt.
            </p>
            <ul class="space-y-4 font-mono text-sm text-zinc-500">
                <li class="flex items-center gap-3">
                    <span class="text-red-500 font-bold">✖</span> GEBREK AAN STRUCTUUR
                </li>
                <li class="flex items-center gap-3">
                    <span class="text-red-500 font-bold">✖</span> VERLAMMENDE ANALYSE
                </li>
                <li class="flex items-center gap-3">
                    <span class="text-red-500 font-bold">✖</span> ANGST VOOR OORDEEL
                </li>
            </ul>
        </div>

        <!-- Right Side: Feature Grid -->
        @php
            $features = [
                [
                    'icon' => 'Lock',
                    'title' => 'Breek De Kooi',
                    'desc' => 'Je beperkingen leg je jezelf op. Wij geven je de sleutel om je mentale gevangenis te openen.'
                ],
                [
                    'icon' => 'Activity',
                    'title' => 'Bouw Veerkracht',
                    'desc' => 'Motivatie is tijdelijk. Discipline is eeuwig. Leer handelen ongeacht hoe je je voelt.'
                ],
                [
                    'icon' => 'Zap',
                    'title' => 'Radicale Waarheid',
                    'desc' => 'We troosten je niet met leugens. We versterken je met de rauwe, ongefilterde waarheid over je potentieel.'
                ]
            ];
        @endphp

        <div class="grid gap-6">
            @foreach ($features as $feature)
                <div class="group p-8 border border-zinc-800 hover:border-colorPrimary hover:bg-zinc-900 transition-all duration-500">
                    @switch($feature['icon'])
                        @case('Lock')
                            <x-lucide-lock class="h-8 w-8 text-colorPrimary mb-6" />
                            @break
                        @case('Activity')
                            <x-lucide-activity class="h-8 w-8 text-colorPrimary mb-6" />
                            @break
                        @case('Zap')
                            <x-lucide-zap class="h-8 w-8 text-colorPrimary mb-6" />
                            @break
                    @endswitch
                    <h3 class="text-xl font-bold text-colorLight mb-3 uppercase tracking-wide">{{ $feature['title'] }}</h3>
                    <p class="text-zinc-400">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>