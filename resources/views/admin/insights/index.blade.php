<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inzicht</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-900">

<div class="max-w-3xl mx-auto px-10 py-10 space-y-16">

    <article class="space-y-6">

        <header class="space-y-2">
            <div class="flex items-center py-4">
                <svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"> 
                    <image id="theme-image-header-logo" href="/images/logos/TheSystemHorse.svg" width="100%" height="100%"/>
                </svg>
                <svg class="h-12 w-72 ml-4">
                    <image id="theme-image-header-logo-text" href="/images/logos/TheSystemTextBlack.svg" width="100%" height="100%"/>
                </svg>
            </div>

            <h1 class="text-3xl font-semibold tracking-tight pt-4">
                Inzicht {{ str_replace('inzicht-', '', $insight->slug) }}
            </h1>
            <h2 class="text-2xl font-medium">{{ $insight->title }}</h2>
            <p class="text-gray-500 italic">{{ $insight->content['subtitle'] ?? '' }}</p>
        </header>

        @foreach ($insight->content['sections'] ?? [] as $section)

            @php
                $isSubSection = substr_count($section['id'], '.') >= 2;
            @endphp

            <section class="space-y-4 {{ $isSubSection ? '' : 'pt-4 border-t border-gray-300' }}">

                @if(isset($section['title']))
                    @php
                        $isNumeric = is_numeric(str_replace('.', '', $section['id']));
                        $isSubSection = substr_count($section['id'], '.') >= 2;
                        $isIntro = $section['id'] === '1.0';
                        $isLast = $loop->last;
                    @endphp

                    <h3 class="{{ $isSubSection ? 'text-lg' : 'text-xl' }} font-medium">
                        @if($isNumeric && !$isSubSection && !$isIntro && !$isLast)
                            {{ $section['id'] }}
                        @endif
                        {{ $section['title'] }}
                    </h3>
                @endif

                @foreach ($section['blocks'] as $block)

                    @if ($block['type'] === 'content')
                        <p class="text-gray-800 leading-relaxed">
                            {{ $block['value'] }}
                        </p>

                    @elseif ($block['type'] === 'bulletlist')
                        <ul class="list-disc list-inside space-y-1 text-gray-800">
                            @foreach ($block['value'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>

                    @elseif ($block['type'] === 'quote')
                        <blockquote class="border-l-4 border-gray-300 pl-4 italic text-gray-700">
                            {{ $block['value'] }}
                        </blockquote>

                    @elseif ($block['type'] === 'prompt')
                        <p class="font-medium text-gray-900">
                            {{ $block['value'] }}
                        </p>

                    @endif

                @endforeach

            </section>

        @endforeach

    </article>

</div>

</body>
</html>