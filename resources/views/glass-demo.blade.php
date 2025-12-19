{{-- resources/views/glass-demo.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Liquid Glass Demo</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Unified glass material (Tailwind-color driven) */
        .glass {
            position: relative;
            backdrop-filter: blur(var(--glass-blur, 12px));
            -webkit-backdrop-filter: blur(var(--glass-blur, 12px));
            border-radius: 1.25rem;
            border: 1px solid rgba(255,255,255,0.25);
            box-shadow:
                0 12px 30px rgba(0,0,0,0.25),
                inset 0 1px 0 rgba(255,255,255,0.35);
            overflow: hidden;
            transition: backdrop-filter .3s ease, transform .3s ease;
        }

        /* Optional hover lift */
        .glass:hover {
            transform: translateY(-2px);
        }

        /* Refraction overlay */
        .glass::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url('#refraction');
            opacity: var(--refraction-opacity, 0.18);
            transform: translateY(var(--refraction-shift, 0px));
            pointer-events: none;
            transition: opacity .2s ease;
        }
    </style>
</head>
<div class="bg-neutral-900 text-white overflow-y-auto">

    <div class="relative" style="height:200vh;">

    <div class="fixed inset-0 flex flex-col items-center justify-center gap-8 pointer-events-none">
        <div class="glass bg-white/35 text-neutral-100 w-full max-w-md p-6 pointer-events-auto">
            <h2 class="text-xl font-semibold mb-2">Liquid Glass</h2>
            <p class="text-sm leading-relaxed text-neutral-300">
                Dit paneel staat vast in het midden.
                Scroll de pagina om de achtergrond en lichtbreking te zien veranderen.
            </p>
        </div>

        <div class="glass bg-black/45 text-neutral-100 w-full max-w-md p-6 pointer-events-auto">
            <h2 class="text-xl font-semibold mb-2">Liquid Glass (Dark)</h2>
            <p class="text-sm leading-relaxed text-neutral-300">
                Dit paneel gebruikt exact dezelfde refraction,
                maar met een donker materiaalprofiel.
            </p>
        </div>

        <div class="glass bg-colorPrimary/40 text-neutral-900 w-full max-w-md p-6 pointer-events-auto">
            <h2 class="text-xl font-semibold mb-2">Liquid Glass (Brand – Yellow)</h2>
            <p class="text-sm leading-relaxed">
                Dit paneel gebruikt de gele brandkleur
                als getint liquid glass materiaal.
            </p>
        </div>

        <div class="glass bg-colorSecondary/40 text-neutral-900 w-full max-w-md p-6 pointer-events-auto">
            <h2 class="text-xl font-semibold mb-2">Liquid Glass (Brand – Blue)</h2>
            <p class="text-sm leading-relaxed">
                Dit paneel gebruikt de blauwe brandkleur
                als getint liquid glass materiaal.
            </p>
        </div>
    </div>

    <div class="absolute inset-0 -z-10">
        <img
            src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee"
            alt="Background"
            class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-black/25"></div>
    </div>

    {{-- SVG defs (important: once per page) --}}
    <svg width="0" height="0">
        <defs>
            <svg id="refraction" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="g1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="white" stop-opacity="0.45"/>
                        <stop offset="50%" stop-color="white" stop-opacity="0.05"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0.35"/>
                    </linearGradient>
                </defs>
                <rect width="400" height="400" fill="url(#g1)" />
            </svg>
        </defs>
    </svg>

    </div>

</div>
</html>