<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>thesystemoftheworld.com</title>
</head>
<body>
    <div class="h-screen bg-yellow-400">
        <div class="bg-black h-16 flex items-center justify-between px-8 text-white">
            <div class="flex items-center">
                <div class="h-auto w-12">
                    {!! file_get_contents(public_path('images/TheSystemHorse.svg')) !!}
                </div>
                <div class="h-auto w-72 ml-4">
                    {!! file_get_contents(public_path('images/TheSystemText.svg')) !!}
                </div>
            </div>
            <div class="font-times text-3xl">COMING SOON...</div>
            <div>
                <div class="h-auto w-60 ml-6">
                    {!! file_get_contents(public_path('images/TheSystemCrypto.svg')) !!}
                </div>
            </div>
        </div>
        {{-- <h1 class="text-white">Welcome to my Blade Template!</h1> --}}
    </div>
</body>
</html>