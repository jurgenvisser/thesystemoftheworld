<div x-show="{{ $index ?? 0 }} < {{ $shown ?? 'shown' }}" class="glow-card p-8 border border-zinc-800 bg-zinc-900/50 hover:border-colorPrimary/50 transition-all duration-200 h-full flex flex-col"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-4"
     x-transition:enter-end="opacity-100 transform translate-y-0">

    <div class="flex flex-col h-full">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="font-bold text-colorLight text-lg">{{ $review['naam'] }}</h3>
                <p class="text-zinc-500 text-xs font-mono mt-1">{{ date('d-m-Y', strtotime($review['datum'])) }}</p>
            </div>

            <div class="flex gap-1">
                @for($i = 1; $i <= 5; $i++)
                    <div class="star-container relative w-4 h-4">
                        <x-lucide-star class="absolute inset-0 w-4 h-4 text-zinc-700"/>
                        @if($review['sterren'] >= $i)
                            <div class="star-fill absolute inset-0 overflow-hidden" style="width: 100%">
                                <x-lucide-star class="w-4 h-4 text-colorPrimary"/>
                            </div>
                        @elseif($review['sterren'] > $i - 1)
                            @php $p = ($review['sterren'] - ($i - 1)) * 100; @endphp
                            <div class="star-fill absolute inset-0 overflow-hidden" style="width: {{ $p }}%">
                                <x-lucide-star class="w-4 h-4 text-colorPrimary"/>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <p class="text-zinc-300 leading-relaxed italic">"{!! nl2br($review['beschrijving']) !!}"</p>
    </div>
</div>