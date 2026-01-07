<section class="relative h-[calc(100vh-4rem)] flex flex-col justify-center px-12 border-b border-zinc-800">
    <div class="absolute inset-0 bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover bg-center opacity-90 zincscale"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent"></div>

    <div class="relative max-w-7xl mx-auto w-full">

        {{-- Header bar --}}
        <div class="flex items-center gap-4 mb-8" style="animation: fadeIn 0.5s ease forwards; animation-delay: 0.2s;">
            <div class="h-px w-12 bg-colorPrimary"></div>
            <span class="font-mono text-xs uppercase tracking-[0.3em] text-colorPrimary">
                <span class="block lg:hidden">The System</span>
                <span class="hidden lg:block">The System of the World</span>
            </span>
        </div>

        {{-- Hero Title --}}
        <h1 class="text-5xl md:text-7xl lg:text-9xl font-bold text-colorLight uppercase tracking-tighter leading-[0.9] mb-12" style="animation: fadeIn 0.5s ease forwards; animation-delay: 0.4s;">
            Jouw verhaal<br>
            <span class="text-zinc-500">Jouw kracht</span>
        </h1>

        {{-- Hero Text --}}
        <p class="max-w-xl text-lg md:text-xl text-zinc-400 leading-relaxed mb-12 border-l-2 border-colorPrimary pl-6" style="animation: fadeIn 0.5s ease forwards; animation-delay: 0.6s;">
            Jouw mentale onderhoud.

            Als je voelt dat motivatie niet genoeg is hoor je hier.
        </p>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4" style="animation: fadeIn 0.5s ease forwards; animation-delay: 0.8s;">
            <a href="/mentorschap" class="inline-block bg-colorPrimary text-black py-3 px-6 text-center hover:bg-colorPrimary/80">Ontdek Mentorschap</a>
            {{-- <a href="#" class="inline-block bg-black text-colorLight py-3 px-6 text-center hover:bg-zinc-800">Lees Het Manifest</a> --}}
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce text-zinc-600">
        <x-lucide-chevron-down class="h-6 w-6" /></span>
    </div>
</section>