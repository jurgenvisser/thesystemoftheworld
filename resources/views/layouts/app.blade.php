{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
               @yield('content')
            </main>
        </div>
    </body>
</html> --}}


<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="The System" />
  <link rel="manifest" href="/site.webmanifest" />
  <meta name="description" content="Ontdek The System: een platform in ontwikkeling dat tools biedt om te groeien, sterker te worden en jezelf te ontdekken. Sluit je aan bij een beweging voor mensen die willen doorbreken. Volg ons voor updates en exclusieve content!" />
  <link rel="stylesheet" href="css/app.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <!-- Add your CSS and JS files here with Vite -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <title>@yield('title', 'Homepage')</title>
</head>
<script src="https://unpkg.com/alpinejs" defer></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DGL4WJCZBJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DGL4WJCZBJ');
</script>
<body class="bg-black font-roboto">
    
  <!-- Navigation of the page -->
  @include('layouts.header')

  <!-- Main information of the page -->
  <div class="content">
    @include('layouts.popup')
    @include('layouts.scroll-to-top-button')

    @yield('content') <!-- The content of the specific page is loaded here -->
  </div>

  <!-- Footer of the page -->
  @include('layouts.footer')

  <script>
      if (window.location.hash && window.location.hash === '#_=_') {
          history.replaceState('', document.title, window.location.pathname + window.location.search);
      }
  </script>

</body>
</html>