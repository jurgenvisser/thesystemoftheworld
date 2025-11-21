@props([
    'label' => 'Standaard Label',
    'title' => 'Standaard Title',
    'subtitle' => 'Standaard subtitle',
    'background' => 'bg-colorPrimary',
    'theme' => 'Primary',
    'forceSecondary' => false,
])

<!-- HERO: Standard Format -->
<section class="relative h-[calc(100vh-4rem)] flex flex-col justify-center px-12 border-b border-zinc-800">
    <div class="absolute inset-0 {{ $background }} bg-cover bg-center opacity-90 grayscale"></div> <!-- Background Image -->
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-black/40"></div> <!-- Gradient Overlay -->

    <!-- Content Wrapper -->
    <div class="relative max-w-7xl mx-auto w-full z-10">
        <div class="relative max-w-4xl mx-auto text-center">
            <!-- Theme color protocol label -->
            <span {{ $forceSecondary ? 'data-theme-fixed' : '' }} class="font-mono text-xs uppercase tracking-widest text-color{{ $theme }} block mb-4">{{ $label }}</span>
            <!-- Headline -->
            <h1 class="text-5xl md:text-8xl font-black font-times text-colorLight mb-6 uppercase">{{ $title }}</h1>
            <!-- Subtitle with top border -->
            <p {{ $forceSecondary ? 'data-theme-fixed' : '' }} class="text-xl md:text-2xl text-zinc-400 font-light max-w-2xl mx-auto border-t-2 border-color{{ $theme}} pt-4">
                {{ $subtitle }}
            </p>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce text-zinc-600">
        <x-lucide-chevron-down class="h-6 w-6" /></span>
    </div>
</section>