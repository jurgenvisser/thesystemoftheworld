<footer class="bg-black text-colorLight py-8 flex justify-center items-center">
    <!-- Footer content container -->
    <div class="responsive-width flex flex-col xl:flex-row justify-between items-center">


        <!-- Section 1: Logo for larger screens -->
        <div class="xl:w-1/4">
            <svg class="theme-toggle h-16 w-48 xl:w-64 2xl:w-60 3xl:w-72 hidden xl:block">
                <image id="theme-image-footer-crypto-flipped-desktop" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
            </svg>
        </div>


        <!-- Section 2: Social media links -->
        <div class="2xl:w-2/4 flex flex-col 2xl:flex-row justify-center items-center text-center 2xl:text-left space-y-6 2xl:space-y-0">
            <div class="text-base xl:text-lg 3xl:text-xl flex flex-col justify-between items-center">
                {{-- <p class="mb-2 font-semibold">Volg <span class="text-colorPrimary">The System</span> voor meer</p> --}}
                <div class="2xl:flex justify-center 2xl:justify-start 2xl:space-x-4 3xl:space-x-8 space-y-2 2xl:space-y-0 font-semibold">
                    <div class="grid 2xl:flex grid-cols-6 gap-4 xl:gap-16 2xl:gap-8">
                        {{-- <span class="col-span-1 block 2xl:hidden"></span> --}}
                        {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            TikTok
                        </a>
                        <!-- Discord -->
                        <a href="{{ $discordInviteLink }}" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            Discord
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            Instagram
                        </a>
                        {{-- <span class="col-span-1 block 2xl:hidden"></span> --}}
                        {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    </div>
                    <div class="grid 2xl:flex grid-cols-6 gap-4 xl:gap-16 2xl:gap-8">
                        <span class="col-span-1 block 2xl:hidden"></span>
                        {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            YouTube
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/people/The-System/61578064385680/" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            Facebook
                        </a>
                        <span class="col-span-1 block 2xl:hidden"></span>
                        {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    </div>
                    {{-- <div class="grid 2xl:flex grid-cols-6 gap-4 xl:gap-16 2xl:gap-8">
                        <span class="col-span-1 block 2xl:hidden"></span> --}}
                        {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        {{-- <!-- WhatsApp -->
                        <a href="https://wa.me/31645603530" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            WhatsApp
                        </a> --}}
                        <!-- X / Twitter -->
                        {{-- <a href="https://www.x.com/TheSystemOTW" target="_blank" class="whitespace-nowrap col-span-2 animate-underline animate-text-color theme-primary">
                            X
                        </a>
                        <span class="col-span-1 block 2xl:hidden"></span> --}}
                        {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    {{-- </div> --}}
                </div>
                <div class="border-t border-gray-800 w-full mt-4 2xl:mt-2 pt-4 2xl:pt-2 2xl:flex justify-center 2xl:space-x-8 space-y-2 2xl:space-y-0 font-semibold">
                    <div class="grid 2xl:flex grid-cols-6 gap-4 2xl:gap-8">
                        <span class="col-span-1 block 2xl:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        <!-- Missie & Visie -->
                        <a href="/missie-visie" class="col-span-2 animate-underline animate-text-color theme-primary text-gray-400">
                            Missie & Visie
                        </a>
                        <!-- Over Ons -->
                        <a href="/over-ons" class="col-span-2 animate-underline animate-text-color theme-primary text-gray-400">
                            Over Ons
                        </a>
                        <span class="col-span-1 block 2xl:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    </div>
                    <div class="grid 2xl:flex grid-cols-6 gap-4 xl:gap-16 2xl:gap-8">
                        <span class="col-span-1 block 2xl:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        <!-- Contact -->
                        <a href="/contact" class="col-span-2 animate-underline animate-text-color theme-primary text-gray-400">
                            Contact
                        </a>
                        <!-- Business -->
                        <a href="/bedrijven" class="col-span-2 animate-underline animate-text-color theme-primary text-gray-800">
                            Business
                        </a>
                        <span class="col-span-1 block 2xl:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    </div>
                </div>
            </div>
        </div>


        <!-- Logo for smaller screens -->
        <svg class="theme-toggle h-16 block my-8 xl:hidden">
            <image id="theme-image-footer-crypto-flipped-mobile" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
        </svg>


        <!-- Section 3: Copyright -->
        <div class="xl:w-1/4 text-sm xl:mt-0 text-center xl:text-right">
            <p>&copy; <span id="current-year"></span> <span class="text-colorPrimary">The System</span>. Alle rechten voorbehouden.</p>
            <p>
                <a href="/privacy-policy" class="animate-underline animate-text-color theme-primary text-gray-600">Privacy Policy</a>
                <span class="text-gray-600"> | </span>
                <a href="/terms-and-conditions" class="animate-underline animate-text-color theme-primary text-gray-600">Terms & Conditions</a>
                {{-- <span class="text-gray-600"> | KVK: 12345678 | BTW: NL123456789B01</span> --}}
            </p>
            <p class="text-gray-800">Website Version: TSotW.2.2.0</p>
        </div>


    </div>
</footer>