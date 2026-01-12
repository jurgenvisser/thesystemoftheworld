<section>    
    <!-- We gebruiken 'glow-card' voor de techniek, en 'discord-glow' voor de kleur override -->
    <div class="glow-card glow-discord relative p-8 md:p-12 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-8 overflow-hidden">
        
        <!-- Blob (automatisch via CSS, maar hier voor de zekerheid) -->
        <!-- <div class="glow-blob"></div> wordt door CSS ::before gedaan -->

        <div class="glow-content relative z-10 flex flex-col md:flex-row items-center gap-6 w-full">
            
            <!-- Icon met Pulse -->
            <div class="relative">
                <div class="absolute inset-0 bg-blurple rounded-full blur-xl opacity-40 animate-pulse"></div>
                <div class="w-24 h-24 bg-blurple rounded-2xl flex items-center justify-center shadow-2xl relative z-10">
                    <!-- Discord Logo SVG -->
                    <span class="bg-discord-white w-16 h-16"></span>
                </div>
            </div>

            <div class="flex-1 text-center md:text-left">
                <h3 class="text-3xl font-bold text-white mb-2">Join The System</h3>
                <p class="text-zinc-400 mb-4 max-w-md">
                    Geen poortwachters meer. Direct toegang tot gelijkgestemden, coaches en gratis events.
                </p>
                
                <!-- Live Status -->
                <div class="inline-flex items-center gap-2 bg-black/40 px-3 py-1 rounded-full border border-white/10">
                    <span class="w-2 h-2 rounded-full bg-[#57F287] shadow-[0_0_10px_#57F287]"></span>
                    <span class="text-xs font-mono text-[#57F287] tracking-widest">{{ $discordMemberCount }} ONLINE</span>
                </div>
            </div>

            <a href="{{ $brevoFormLink }}" class="bg-blurple hover:bg-blurple/80 text-white px-8 py-4 rounded-xl font-bold uppercase tracking-wider transition-all transform hover:-translate-y-1 shadow-[0_10px_20px_rgba(88,101,242,0.3)]">
                Join Nu
            </a>
        </div>
    </div>
</section>