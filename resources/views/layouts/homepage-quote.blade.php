{{-- Quote Slider Section --}}
@php
    // Add as many quotes as you want here
    $quotes = [
        'JE HEBT GEEN MOTIVATIE NODIG. JE HEBT EEN SYSTEEM NODIG.',
        'DISCIPLINE IS WAT OVERBLIJFT ALS MOTIVATIE WEGVALT.',
        'Wachten verandert niets. Begin vandaag.',
    ];
@endphp

<section class="py-8 lg:py-32 px-6 bg-zinc-300 text-black text-center relative">

    <div class="max-w-4xl mx-auto overflow-hidden flex flex-col relative">

        {{-- Slider Container --}}
        <div id="quoteSlider" class="flex transition-transform duration-1000 ease-in-out">

            @foreach ($quotes as $quote)
                <div class="flex-shrink-0 w-full px-6">
                    <h2 class="text-3xl md:text-5xl leading-tight mb-8 uppercase">
                        "{{ $quote }}"
                    </h2>
                </div>
            @endforeach

        </div>

        <p class="font-mono text-sm uppercase tracking-widest text-zinc-600 absolute bottom-0 left-1/2 -translate-x-1/2">— The System</p>

    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('quoteSlider');
        const slides = slider.children.length;

        // Clone first slide and append to end for seamless looping
        const firstClone = slider.children[0].cloneNode(true);
        slider.appendChild(firstClone);

        let index = 0;
        const intervalTime = 15000;

        setInterval(() => {
            index++;
            slider.style.transition = 'transform 1s ease-in-out';
            slider.style.transform = `translateX(-${index * 100}%)`;

            // If we reach the cloned slide, instantly jump back to real first
            if (index === slides) {
                setTimeout(() => {
                    slider.style.transition = 'none';
                    slider.style.transform = 'translateX(0%)';
                    index = 0;
                }, 1000); // matches transition duration
            }
        }, intervalTime);
    });
</script>
