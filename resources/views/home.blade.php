<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>thesystemoftheworld.com</title>
</head>
<body class="h-screen bg-yellow-400 m-0">
    <div class="h-full flex flex-col">
        <!-- Header -->
        <div class="bg-black h-16 flex items-center justify-between px-8 text-white">
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
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">
            <!-- Image Section -->
            <div class="w-96 lg:w-[600px] lg:h-[600px] bg-black hidden lg:block">
                {!! file_get_contents(public_path('images/TheSystemFull.svg')) !!}
            </div>

            <!-- Text Content Section -->
            <div class="bg-black font-times text-sm lg:text-2xl text-white p-8 h-auto lg:h-[600px] w-96 lg:w-[900px] lg:ml-8 text-center lg:text-left leading-loose">
                We begrijpen dat je hier bent omdat je iets zoekt. Een antwoord, een oplossing, een stap vooruit. En dat is precies wat The System biedt. <br><br>
                Op dit moment zijn we hard bezig met het bouwen van een platform dat jouw leven kan veranderen. Een plek waar je de tools vindt om te groeien, sterker te worden, en jezelf te ontdekken. <br><br>
                Dit wordt een beweging. The System is voor de mensen die willen winnen, die vastberaden zijn om door te breken. <br><br>
                Blijf op de hoogte voor updates en wees de eerste die toegang krijgt tot exclusieve content, producten, en meer. <br><br><br>
                Volg <span class="text-systemYellow font-bold">The System</span> voor meer!<br>
                TikTok: <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="underline decoration-systemYellow">@thesystemoftheworld</a>.
                <div class="w-full bg-black block lg:hidden pt-2 lg:pt-0">
                    {!! file_get_contents(public_path('images/TheSystemCrypto.svg')) !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>