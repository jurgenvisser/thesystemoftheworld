{{-- Mentorschap Section --}}
<section id="mentorschap" class="relative bg-colorPrimary/10 px-12 py-24 md:py-32 border-t border-b border-zinc-800 overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-colorPrimary/5 -skew-x-12 transform translate-x-1/4 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center relative z-10">
        <div>
            <div class="font-mono text-colorPrimary text-sm uppercase tracking-widest mb-4">Persoonlijk Traject</div>
            <h2 class="text-4xl md:text-5xl font-bold text-colorLight mb-8 leading-tight">
                MENTORSCHAP VAN IEMAND DIE HET <span class="text-colorPrimary">ZELF OVERLEEFDE</span>.
            </h2>
            <p class="text-lg text-zinc-300 mb-6">
                Geen droge theorie, maar concrete structuur, echte gesprekken en begeleiding die je daadwerkelijk vooruit helpen.
            </p>
            <ul class="space-y-4 mb-10 font-mono text-sm text-zinc-400">
                <li class="flex items-center gap-3"><span class="text-colorPrimary"><x-lucide-chevron-right class="h-6 w-6 text-colorPrimary" /></span> Geen oordeel over je verleden</li>
                <li class="flex items-center gap-3"><span class="text-colorPrimary"><x-lucide-chevron-right class="h-6 w-6 text-colorPrimary" /></span> 1-op-1 gesprekken & begeleiding</li>
                <li class="flex items-center gap-3"><span class="text-colorPrimary"><x-lucide-chevron-right class="h-6 w-6 text-colorPrimary" /></span> Focus op herstel en groei</li>
            </ul>
            <a href="/quinn" class="inline-block px-8 py-4 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/80 transition-all">
                Lees Quinn's Verhaal
            </a>
        </div>
        
    <div class="relative">
        <div class="glow-card relative z-0 group">
            <div class="glow-blob z-10"></div> 

            <div class="glow-content relative z-20">
                <div class="">
                    <img 
                        src="{{ asset('images/TheSystemProfilePicture.jpeg') }}" 
                        alt="Quinn de coach van The System" 
                        class="w-full h-auto"
                    />
                </div>
            </div>
        </div>

        <div class="glow-card absolute bottom-6 -left-6 bg-black outline outline-2 -outline-offset-1 outline-colorPrimary p-6 max-w-xs transition-all duration-300 z-30" 
            style="--disable-border-glow: 1;">
            <div class="glow-blob"></div>

            <div class="glow-content">
                <p class="text-colorLight font-bold text-lg">"Ik vertel je niet wat je moet doen. Ik laat je zien wat werkt"</p>
                <p class="text-zinc-500 text-sm mt-1">- Quinn</p>
            </div>
        </div>
    </div>
</section>
