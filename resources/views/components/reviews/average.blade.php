<!-- HERO SECTION: STATISTIEKEN -->
<section class="py-20 px-6 border-b border-zinc-900 bg-zinc-950">
    <div class="max-w-4xl mx-auto text-center">
        <span class="font-mono text-xs uppercase tracking-widest text-colorPrimary block mb-4">BEWIJSLAST</span>
        <h1 class="text-4xl md:text-6xl font-black text-colorLight uppercase mb-8">RESULTATEN SPREKEN</h1>
        
        <!-- Grote Gemiddelde Score -->
        <div class="glow-card flex flex-col items-center justify-center gap-4 bg-zinc-900/50 p-8 border border-zinc-800 rounded-lg max-w-lg mx-auto">
            {{-- <div class="glow-blob"></div> --}}
            <div class="glow-context text-6xl font-black text-colorLight">{{ number_format($reviewsAverage, 1) }}</div>
            
            <!-- Dynamische Sterren Weergave (Groot) -->
            <div class="flex gap-2">
                @for($i = 1; $i <= 5; $i++)
                    <div class="star-container relative w-12 h-12">
                        
                        <!-- Achtergrond ster (grijs) -->
                        <x-lucide-star class="absolute inset-0 w-12 h-12 text-zinc-700" />

                        <!-- Voorgrond ster (geel) -->
                        @if($reviewsAverage >= $i)
                            <div class="star-fill absolute inset-0 overflow-hidden" style="width: 100%">
                                <x-lucide-star class="w-12 h-12 text-colorPrimary" />
                            </div>
                        @elseif($reviewsAverage > $i - 1)
                            @php $percentage = ($reviewsAverage - ($i - 1)) * 100; @endphp
                            <div class="star-fill absolute inset-0 overflow-hidden" style="width: {{ $percentage }}%">
                                <x-lucide-star class="w-12 h-12 text-colorPrimary" />
                            </div>
                        @endif

                    </div>
                @endfor
            </div>
            <p class="text-zinc-500 font-mono text-sm mt-2">GEBASEERD OP {{ $reviewsCount }} GEVERIFIEERDE LEDEN</p>
        </div>
    </div>
</section>