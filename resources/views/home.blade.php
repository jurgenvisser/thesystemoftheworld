<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>thesystemoftheworld.com</title>
</head>
<body>
    <div class="h-screen bg-systemYellow flex flex-col">
        <!-- Header Section -->
        <div class="bg-black h-16 flex items-center justify-center lg:justify-between px-8 text-white">
            <div class="flex items-center">
                <div class="h-auto w-12">
                    {!! file_get_contents(public_path('images/TheSystemHorse.svg')) !!}
                </div>
                <div class="h-auto w-72 ml-4">
                    {!! file_get_contents(public_path('images/TheSystemText.svg')) !!}
                </div>
            </div>
             <div class="font-times text-3xl hidden lg:block">COMING SOON...</div>
            <div>
                <div class="h-auto w-60 ml-6 hidden lg:block">
                    {!! file_get_contents(public_path('images/TheSystemCrypto.svg')) !!}
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row">
            <!-- Image Section -->
            <div class="w-96 bg-black">
                {!! file_get_contents(public_path('images/TheSystemFull.svg')) !!}
            </div>

            <!-- Text Content Section -->
            <div class="bg-black font-times text-xl text-white p-8 h-96 w-96 mt-8 lg:mt-0 lg:ml-8 text-center lg:text-left">
                We’re working hard behind the scenes to create something amazing for you! Our website is currently under development and will be live very soon. <br>
                In the meantime, stay connected and get exclusive updates by following us on TikTok: <span class="underline decoration-systemYellow">@thesystemoftheworld</span>. <br>
                Thank you for your patience – we can’t wait to share what’s coming next!
            </div>      
        </div>
    </div>
</body>
            
</html>