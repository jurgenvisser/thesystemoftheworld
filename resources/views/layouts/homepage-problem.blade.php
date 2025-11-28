<section id="philosophy" class="bg-black px-12 py-20 md:py-32 border-b border-zinc-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-24 items-start">
        
        <!-- Left Side: Text Content -->
        {{-- add classes md:sticky md:top-32 to make text sticky on scroll --}}
        <div class="space-y-8">
            <h2 class="text-4xl md:text-6xl font-bold text-colorLight tracking-tight uppercase">
                De <span class="text-colorPrimary">chaos</span><br/>in je hoofd
            </h2>
            <p class="text-zinc-400 text-lg">
                Je kunt meer, maar je hoofd remt je af.
                Je hebt motivatie genoeg, je mist orde.
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
    
                {{-- 1. Maak dit de Glow Card --}}
                <div class="glow-card relative p-8 transition-all duration-300">
                    
                    {{-- 2. De Glow Blob MOET het eerste element zijn --}}
                    <div class="glow-blob"></div>

                    {{-- 3. Wrap de inhoud in glow-content --}}
                    <div class="glow-content">
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
                            @default
                                {{-- Optionele fallback icon --}}
                                <x-lucide-help-circle class="h-8 w-8 text-colorPrimary mb-6 flex-shrink-0" />
                        @endswitch
                        
                        <h3 class="text-xl font-bold text-colorLight mb-3 uppercase tracking-wide">{{ $feature['title'] }}</h3>
                        <p class="text-zinc-400">{{ $feature['desc'] }}</p>
                    </div>
                    {{-- Einde glow-content --}}
                </div>
            @endforeach
        </div>
    </div>
</section>
