<section class="py-20 px-6 bg-black flex justify-center" x-data="{ shown: 4, total: {{ $reviewsCount }} }">
    <div class="responsive-width">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            @foreach($reviews as $index => $review)
                <div class="h-full">
                    @include('components.reviews.card', ['review' => $review, 'index' => $index, 'shown' => 'shown'])
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center" x-show="shown < total">
            <button @click="shown += 4" class="inline-block px-8 py-4 font-mono text-sm uppercase border border-zinc-700 text-colorLight hover:border-colorPrimary hover:text-colorPrimary transition-all cursor-pointer">
                Laad Meer Recensies (+4)
            </button>
            <p class="mt-4 text-zinc-600 text-xs font-mono uppercase">
                Toont <span x-text="Math.min(shown, total)"></span> van <span x-text="total"></span>
            </p>
        </div>
    </div>
</section>