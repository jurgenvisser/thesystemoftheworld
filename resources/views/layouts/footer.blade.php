<footer class="bg-black text-white py-8">
    <div class="container mx-auto px-6">
        <!-- Footer content container -->
        <div class="flex flex-col lg:flex-row justify-between items-center">

            <!-- Logo for larger screens -->
            <svg class="theme-toggle h-16 w-80 hidden lg:block">
                <image id="theme-image-footer-crypto-flipped-desktop" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
            </svg>

            <!-- Footer content and social media links -->
            <div class="flex flex-col lg:flex-row justify-between items-center lg:w-2/3 text-center lg:text-left space-y-6 lg:space-y-0">
                <!-- Social media links -->
                <div class="text-base lg:text-xl flex flex-col justify-between items-center">
                    <p class="mb-2 font-semibold">Follow <span class="text-colorPrimary">The System</span> for more</p>
                    <div class="flex justify-center lg:justify-start space-x-8 font-semibold">
                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            TikTok
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            YouTube
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            Instagram
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/thesystemoftheworld" target="_blank" class="animate-underline animate-text-color theme-primary">
                            Facebook
                        </a>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="text-sm mt-6 lg:mt-0 text-center lg:text-right">
                    <p>&copy; <span id="current-year"></span> <span class="text-colorPrimary">The System</span>. All rights reserved.</p>
                    <p>
                        <a href="/privacy-policy" class="animate-underline animate-text-color theme-primary !text-gray-600">Privacy Policy</a>
                        <span class="text-gray-600"> | </span>
                        <a href="/terms-and-conditions" class="animate-underline animate-text-color theme-primary !text-gray-600">Terms & Conditions</a>
                        {{-- <span class="text-gray-600"> | KVK: 12345678 | BTW: NL123456789B01</span> --}}
                    </p>
                    <p class="text-gray-800">Website Version: TSotW.1.1.5d</p>
                </div>

                <!-- Logo for smaller screens -->
                <svg class="theme-toggle h-16 block lg:hidden">
                    <image id="theme-image-footer-crypto-flipped-mobile" href="/images/logos/BlueprintCrypto.svg" width="100%" height="100%"/>
                </svg>
            </div>
        </div>
    </div>
</footer>