<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>thesystemoftheworld.com</title>
</head>
<body>
    <div class="h-screen bg-systemYellow">
        <div class="bg-black h-16 flex items-center justify-between px-8 text-white">
            <div class="flex items-center">
                <div class="h-auto w-12">
                    {!! file_get_contents(public_path('images/TheSystemHorse.svg')) !!}
                </div>
                <div class="h-auto w-72 ml-4">
                    {!! file_get_contents(public_path('images/TheSystemText.svg')) !!}
                </div>
            </div>
            <div class="font-times text-3xl">COMMING SOON...</div>
            <div>
                <div class="h-auto w-60 ml-6">
                    {!! file_get_contents(public_path('images/TheSystemCrypto.svg')) !!}
                </div>
            </div>
        </div>

        <div class="flex flex-row h-screen">
            <!-- Other content above -->
            <div class="flex-1 flex items-center justify-center">
                <div class="h-auto w-96 ml-6 bg-black">
                    {!! file_get_contents(public_path('images/TheSystemFull.svg')) !!}
                    
                </div>
                {{-- <div class="flex-1 bg-black font-times text-xl capitalize text-white p-8">
                    <div>
                        We’re working hard behind the scenes to create something amazing for you! Our website is currently under development and will be live very soon.
                    </div>
                    <div class="py-3">
                        In the meantime, stay connected and get exclusive updates by following us on TikTok: <span class="underline decoration-systemYellow">@thesystemoftheworld</span>.
                    </div>
                    <div>
                        Thank you for your patience – we can’t wait to share what’s coming next!
                    </div>
                </div> --}}
            </div>
            
            <!-- Other content below -->
          </div>
        {{-- <h1 class="text-white">Welcome to my Blade Template!</h1> --}}
    </div>
</body>
</html>