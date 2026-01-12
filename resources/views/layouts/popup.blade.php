<div id="popup" class="fixed inset-0 bg-colorPrimary/30 backdrop-blur flex items-center justify-center hidden z-50">
    <div class="relative bg-black rounded-xl shadow-lg w-10/12 max-w-2xl text-left p-6 lg:p-20 responsive-height">
        <button id="closePopup" class="absolute top-2 lg:top-6 right-4 lg:right-8 text-gray-700 text-2xl font-bold hover:text-gray-500" aria-label="Close popup">
            <x-lucide-x class="h-6 w-6" />
        </button>
        <h2 class="text-colorLight text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold mb-4 lg:mb-8">
            Niets verandert… totdat jij dat wél doet.
        </h2>
        <p class="text-colorLight text-base md:text-lg lg:text-xl mb-6 lg:mb-12">
            <span class="font-bold text-colorPrimary">The System</span> is jouw mentale blueprint — gemaakt om je hoofd, je leven en je richting terug te pakken.
        </p>
        <p class="text-colorLight text-base md:text-lg lg:text-xl mb-2 lg:mb-4">
            Ben jij klaar om:
        </p>
        <ul class="text-left text-colorLight text-base md:text-lg lg:text-xl space-y-2 mb-6 lg:md-12">
            <li class="flex items-center justify-start gap-4 flex-shrink-0"><x-lucide-flame class="w-6 h-6 min-w-6 min-h-6 flex-shrink-0 text-white" /> <span class="font-medium">Je angsten te stoppen</span></li>
            <li class="flex items-center justify-start gap-4 flex-shrink-0"><x-lucide-brain class="w-6 h-6 min-w-6 min-h-6 flex-shrink-0 text-white" /> <span class="font-medium">Rust in je hoofd te krijgen</span></li>
            <li class="flex items-center justify-start gap-4 flex-shrink-0"><x-lucide-bow-arrow class="w-6 h-6 min-w-6 min-h-6 flex-shrink-0 text-white" /> <span class="font-medium">Discipline en structuur op te bouwen</span></li>
            <li class="flex items-center justify-start gap-4 flex-shrink-0"><x-lucide-ban class="w-6 h-6 min-w-6 min-h-6 flex-shrink-0 text-white" /> <span class="font-medium">Eindelijk te stoppen met excuses</span></li>
        </ul>
        <p class="text-colorLight text-base md:text-lg lg:text-xl mb-4 lg:mb-8">
            Dit is geen praat. Dit is een systeem dat levens red. <br>
            Als je verschijnt, groei je.
        </p>
        <div class="flex py-2 lg:py-8">
            <a href="{{ $brevoFormLink }}" class="bg-colorPrimary text-black text-base md:text-lg lg:text-xl px-6 py-2.5 shadow hover:bg-colorPrimary/80 w-full text-center font-mono flex items-center justify-center gap-4">
                <x-lucide-notebook class="w-6 h-6 text-black" />Ik ben klaar <x-lucide-pen-line class="w-6 h-6 text-black" />
            </a>
        </div>
    </div>
</div>