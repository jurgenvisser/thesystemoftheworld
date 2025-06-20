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
    @include('components.popup')
    @include('components.scroll-to-top-button')

    @yield('content') <!-- The content of the specific page is loaded here -->
  </div>

  <!-- Footer of the page -->
  @include('layouts.footer')

</body>
</html>