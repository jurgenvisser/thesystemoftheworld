<section id="proces" class="px-12 py-20 md:py-32 bg-zinc-950">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-colorLight mb-4">HET 3-FASEN SYSTEEM</h2>
            <p class="text-zinc-500 text-lg">Drie stappen van chaos naar controle.</p>
        </div>
        
        <div class="relative flex flex-col gap-12 lg:gap-0 lg:flex-row justify-between">
            
            {{-- Stap 1: Aanmelding --}}
            <div class="lg:w-1/3 p-6 md:p-10 relative z-10 rounded-xl glow-card">
                {{-- De Glow Blob --}}
                <div class="glow-blob"></div>

                {{-- De Glow Content Wrapper --}}
                <div class="glow-content">
                    <div class="w-16 h-16 rounded-full bg-colorPrimary text-black flex items-center justify-center font-black text-2xl mb-6 mx-auto lg:mx-0">
                        1
                    </div>
                    <h3 class="text-2xl font-mono text-colorPrimary mb-4 uppercase tracking-wider text-center lg:text-left">Aanmelding</h3>
                    <p class="text-zinc-400 leading-relaxed mb-6 text-center lg:text-left">
                        We starten met een korte intake om te kijken waar je nu staat en wat je wilt bereiken.
                    </p>
                    <ul class="space-y-2 text-zinc-300 font-mono text-sm text-left">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Intake formulier</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">30 min. 1-op-1</span> (geen kosten)
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Nul-meting van discipline</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Divider 1 --}}
            <div class="hidden lg:flex items-center justify-center w-[10%] relative text-colorPrimary">
                <div class="absolute w-full h-0.5 bg-zinc-700"></div>
                <x-lucide-move-right class="w-8 h-8 rotate-90 lg:rotate-0 text-colorPrimary" />
            </div>

            {{-- Stap 2: Het Plan --}}
            <div class="lg:w-1/3 p-6 md:p-10 relative z-10 rounded-xl glow-card">
                {{-- De Glow Blob --}}
                <div class="glow-blob"></div>

                {{-- De Glow Content Wrapper --}}
                <div class="glow-content">
                    <div class="w-16 h-16 rounded-full bg-colorPrimary text-black flex items-center justify-center font-black text-2xl mb-6 mx-auto lg:mx-0">
                        2
                    </div>
                    <h3 class="text-2xl font-mono text-colorPrimary mb-4 uppercase tracking-wider text-center lg:text-left">Het plan</h3>
                    <p class="text-zinc-400 leading-relaxed mb-6 text-center lg:text-left">
                        We bouwen een persoonlijk systeem dat werkt voor jou en jouw uitdagingen.
                    </p>
                    <ul class="space-y-2 text-zinc-300 font-mono text-sm text-left">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Blueprint-modules</span> – mentale onderhoud, opdrachten en uitdagingen afgestemd op jou
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Persoonlijke weekplanning & routines</span> – structuur en focus in je dagelijks leven
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Wekelijkse 1-op-1 sessie (optioneel)</span> – extra coaching als je merkt dat je het nodig hebt
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Divider 2 --}}
            <div class="hidden lg:flex items-center justify-center w-[10%] relative text-colorPrimary">
                <div class="absolute w-full h-0.5 bg-zinc-700"></div>
                <x-lucide-move-right class="w-8 h-8 rotate-90 lg:rotate-0 text-colorPrimary" />
            </div>
            
            {{-- Stap 3: Resultaat --}}
            <div class="lg:w-1/3 p-6 md:p-10 relative z-10 rounded-xl glow-card">
                {{-- De Glow Blob --}}
                <div class="glow-blob"></div>

                {{-- De Glow Content Wrapper --}}
                <div class="glow-content">
                    <div class="w-16 h-16 rounded-full bg-colorPrimary text-black flex items-center justify-center font-black text-2xl mb-6 mx-auto lg:mx-0">
                        3
                    </div>
                    <h3 class="text-2xl font-mono text-colorPrimary mb-4 uppercase tracking-wider text-center lg:text-left">Resultaat</h3>
                    <p class="text-zinc-400 leading-relaxed mb-6 text-center lg:text-left">
                        Dit is je maandelijkse mentale onderhoud. Hier pas je het systeem toe en zie je echt resultaat.
                    </p>
                    <ul class="space-y-2 text-zinc-300 font-mono text-sm text-left">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Angsten overwonnen</span> – je oude blokkades verdwijnen stap voor stap
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Discipline vanzelfsprekend</span> – routines zijn onderdeel van je dagelijks leven
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Zelfstandiger en gefocust</span> – je weet wat je moet doen en hoe je vooruitkomt
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Mentale kracht en veerkracht</span> – je blijft sterk, ook onder druk
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="h-6 w-6 text-colorPrimary flex-shrink-0" />
                            <div class="flex-1">
                                <span class="font-bold">Hulp wanneer nodig</span> – altijd support beschikbaar
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>