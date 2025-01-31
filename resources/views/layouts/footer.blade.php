<footer class="bg-black text-white py-8">
    <div class="container mx-auto px-6">
        <!-- Footer content container -->
        <div class="flex flex-col lg:flex-row justify-between items-center">

            <!-- Logo for larger screens -->
            <svg class="theme-toggle h-auto w-48 sm:w-72 ml-4 hidden lg:block">
                <image id="theme-image-footer-crypto-flipped-desktop" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
            </svg>
            
            {{-- <div class="bg-systemYellow/20">
                <button class="theme-toggle bg-systemYellow text-white border-systemYellow p-2 rounded">
                    Toggle Theme
                </button>
            </div> --}}

            <!-- Footer content and social media links -->
            <div class="flex flex-col lg:flex-row justify-between items-center lg:w-2/3 text-center lg:text-left space-y-6 lg:space-y-0">
                <!-- Social media links -->
                <div class="text-md lg:text-xl flex flex-col justify-between items-center">
                    <p class="mb-2 font-semibold">Follow <span class="text-systemYellow">The System</span> for more</p>
                    <div class="flex justify-center lg:justify-start space-x-8 font-semibold">
                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-yellow">
                            TikTok
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="animate-underline animate-text-color theme-yellow">
                            YouTube
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-yellow">
                            Instagram
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/thesystemofthewolrd" target="_blank" class="animate-underline animate-text-color theme-yellow">
                            Facebook
                        </a>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="text-sm mt-6 lg:mt-0">
                    <p class="">&copy; <span id="current-year"></span> <span class="text-systemYellow">The System</span>. All rights reserved.</p>
                </div>

                <!-- Logo for smaller screens -->
                <svg class="theme-toggle h-auto w-48 sm:w-72 ml-4 block lg:hidden">
                    <image id="theme-image-footer-crypto-flipped-mobile" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
                </svg>
            </div>
        </div>
    </div>
</footer>