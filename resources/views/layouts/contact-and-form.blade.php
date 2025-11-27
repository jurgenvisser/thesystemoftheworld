<section class="relative py-24 md:py-28 lg:flex lg:justify-center lg:items-center px-6">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-start">
        
        <!-- CONTACT INFORMATIE & MISSIE -->
        <div class="lg:sticky lg:top-10 space-y-10">
            <div class="space-y-4">
                <span class="font-mono text-xs uppercase tracking-widest text-colorPrimary block mb-4">CONNECTIE</span>
                <h1 class="text-5xl md:text-6xl font-black text-colorLight tracking-tighter leading-none uppercase">
                    Ontvangst
                </h1>
                <p class="text-xl md:text-2xl text-zinc-400 font-light border-b-2 border-colorPrimary pb-4">
                    Tijd is je waardevolste bezit. Handel snel en duidelijk.
                </p>
            </div>

            <div class="space-y-6">
                <div class="font-mono">
                    <h3 class="text-lg font-bold text-colorPrimary mb-1 uppercase tracking-wider">EMAIL COMMUNICATIE</h3>
                    <p class="text-zinc-300">
                        Voor vragen over Coaching, Blueprint Modules of Producten.
                    </p>
                    <a href="mailto:contact@thesystemoftheworld.com" class="text-colorLight text-base font-bold animate-underline animate-text-color theme-primary underline-offset-4">
                        contact@thesystemoftheworld.com
                    </a>
                    <p class="text-zinc-300 pt-4">
                        Voor Sponsorship of Partnerschappen.
                    </p>
                    <a href="mailto:admin@thesystemoftheworld.com" class="text-colorLight text-base font-bold animate-underline animate-text-color theme-primary underline-offset-4">
                        admin@thesystemoftheworld.com
                    </a>
                </div>

                <div class="font-mono">
                    <h3 class="text-lg font-bold text-colorPrimary mb-1 uppercase tracking-wider">SOCIALE PLATFORMS</h3>
                    <p class="text-zinc-300">
                        Volg de dagelijkse updates en nieuwe content.
                    </p>
                    <ul class="flex gap-4 mt-2 text-zinc-500 font-bold">
                        <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            TikTok
                        </a>
                        <!-- Discord -->
                        <a href="{{ $discordInviteLink }}" target="_blank" class="animate-underline animate-text-color theme-primary">
                            Discord
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            Instagram
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/people/The-System/61578064385680/" target="_blank" class="animate-underline animate-text-color theme-primary">
                            Facebook
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            YouTube
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <!-- CONTACT FORMULIER (DE ACTIE) -->
        <div class="bg-zinc-900/50 p-8 md:p-12 rounded-lg border border-zinc-800 shadow-xl">
            <h2 class="text-3xl font-bold text-colorLight mb-6">DIRECT BERICHT</h2>
            <p class="text-zinc-400 mb-8">
                Gebruik dit formulier alleen voor gerichte vragen.
            </p>

            <form action="https://formsubmit.co/contact@thesystemoftheworld.com" method="POST" class="space-y-6">
                <input type="hidden" name="_autoresponse" value="Dankjewel voor je bericht aan The System! Wij zullen je zo snel mogenlijk een passend antwoord geven.">
                <input type="hidden" name="_next" value="thesystemoftheworld.com/bedankt-voor-je-bericht">
                <input type="hidden" name="_template" value="basic">
                <input type="text" name="_honey" style="display:none">
                <input type="hidden" name="_cc" value="jurgenbv@gmail.com,limitedjqc@gmail.com">
                
                <div>
                    <label for="name" class="block text-sm font-medium text-zinc-300 mb-2">Jouw Volledige Naam</label>
                    <input 
                        id="name" type="text" name="name" placeholder="Naam en Achternaam" required
                        class="w-full px-4 py-3 bg-black border border-zinc-700 rounded-md text-colorLight input-focus"
                    >
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-300 mb-2">Jouw Email Adres</label>
                    <input 
                        id="email" type="email" name="email" placeholder="focus@domein.com" required
                        class="w-full px-4 py-3 bg-black border border-zinc-700 rounded-md text-colorLight input-focus"
                    >
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-zinc-300 mb-2">Onderwerp</label>
                    <select
                        id="subject" name="_subject" required
                        class="w-full px-4 py-3 bg-black border border-zinc-700 rounded-md text-colorLight input-focus appearance-none"
                    >
                        <option value="" disabled selected>Kies het meest relevante onderwerp</option>
                        <option value="Mentorschap Aanvraag">Mentorschap Aanvraag</option>
                        <option value="Vraag over Blueprint Modules">Vraag over Blueprint Modules</option>
                        <option value="Partnerschap/Media">Partnerschap/Media</option>
                        <option value="Overig">Overig</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-zinc-300 mb-2">Jouw Bericht (Kort en Krachtig)</label>
                    <textarea
                        id="message" name="message" rows="5" placeholder="Formuleer je vraag zo duidelijk mogelijk." required
                        class="w-full px-4 py-3 bg-black border border-zinc-700 rounded-md text-colorLight input-focus"
                    ></textarea>
                </div>

                <div id="messageBox" class="text-sm font-mono p-4 rounded-md hidden"></div>

                <button type="submit" 
                        class="w-full px-6 py-4 font-mono text-sm uppercase bg-colorPrimary text-black font-bold hover:bg-colorPrimary/90 transition-all shadow-lg shadow-colorPrimary/20">
                    VERSTUUR BERICHT &rarr;
                </button>
                <p class="text-xs lg:text-sm text-zinc-700">
                    *Door het formulier in te vullen en op te sturen ga je akkoord met onze <a href="/privacy-policy" class="animate-underline animate-text-color theme-primary !text-zinc-700">Privacy Policy</a> en <a href="/terms-and-conditions" class="animate-underline animate-text-color theme-primary !text-zinc-700">Terms & Conditions</a>.
                </p>
            </form>
        </div>
    </div>
</section>