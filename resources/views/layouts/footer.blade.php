<footer class="bg-black text-white py-8">
    <!-- Footer content container -->
    <div class="container mx-auto responsive-width flex flex-col lg:flex-row justify-between items-center">


        <!-- Section 1: Logo for larger screens -->
        <div class="lg:w-1/4">
            <svg class="theme-toggle h-16 w-80 hidden lg:block">
                <image id="theme-image-footer-crypto-flipped-desktop" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
            </svg>
        </div>


        <!-- Section 2: Social media links -->
        <div class="lg:w-2/4 flex flex-col lg:flex-row justify-center items-center text-center lg:text-left space-y-6 lg:space-y-0">
            <div class="text-base lg:text-xl flex flex-col justify-between items-center">
                <p class="mb-2 font-semibold">Follow <span class="text-colorPrimary">The System</span> for more</p>
                <div class="lg:flex justify-center lg:justify-start lg:space-x-8 space-y-2 lg:space-y-0 font-semibold">
                    <div class="grid lg:flex grid-cols-6 gap-4 lg:gap-8">
                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            TikTok
                        </a>
                        <!-- Telegram -->
                        <a href="https://t.me/+hS5RjxjtFvw2ZjFk" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            Telegram
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            YouTube
                        </a>
                    </div>
                    <div class="grid lg:flex grid-cols-6 gap-4 lg:gap-8">
                        <span class="col-span-1 block lg:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            Instagram
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/thesystemoftheworld" target="_blank" class="col-span-2 animate-underline animate-text-color theme-primary">
                            Facebook
                        </a>
                        <span class="col-span-1 block lg:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    </div>
                </div>
                <div class="border-t border-gray-800 w-full mt-4 lg:mt-2 pt-2 lg:pt-0 lg:flex justify-center lg:space-x-8 space-y-2 lg:space-y-0 font-semibold">
                    <div class="grid lg:flex grid-cols-6 gap-4 lg:gap-8">
                        <span class="col-span-2 block lg:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                        <!-- Business -->
                        <a href="/bedrijven" class="col-span-2 animate-underline animate-text-color theme-primary !text-gray-800">
                            Business
                        </a>
                        <span class="col-span-2 block lg:hidden"></span> {{-- ! This is a spacer for smaller screens. Please remove if there are 3 links in this div --}}
                    </div>
                </div>
            </div>
        </div>


        <!-- Logo for smaller screens -->
        <svg class="theme-toggle h-16 block my-8 lg:hidden">
            <image id="theme-image-footer-crypto-flipped-mobile" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
        </svg>


        <!-- Section 3: Copyright -->
        <div class="lg:w-1/4 text-sm lg:mt-0 text-center lg:text-right">
            <p>&copy; <span id="current-year"></span> <span class="text-colorPrimary">The System</span>. All rights reserved.</p>
            <p>
                <a href="/privacy-policy" class="animate-underline animate-text-color theme-primary !text-gray-600">Privacy Policy</a>
                <span class="text-gray-600"> | </span>
                <a href="/terms-and-conditions" class="animate-underline animate-text-color theme-primary !text-gray-600">Terms & Conditions</a>
                {{-- <span class="text-gray-600"> | KVK: 12345678 | BTW: NL123456789B01</span> --}}
            </p>
            <p class="text-gray-800">Website Version: TSotW.1.2.7p</p>
        </div>


    </div>
</footer>