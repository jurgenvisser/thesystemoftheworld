<footer class="bg-black text-white py-8">
    <div class="container mx-auto px-6">
        <!-- Footer content container -->
        <div class="flex flex-col lg:flex-row justify-between items-center">

            <!-- Logo for larger screens -->
            <div class="h-auto w-60 ml-6 hidden lg:block">
                {!! file_get_contents(public_path('images/logos/TheSystemCrypto.svg')) !!}
            </div>

            <!-- Footer content and social media links -->
            <div class="flex flex-col lg:flex-row justify-between items-center lg:w-2/3 text-center lg:text-left space-y-6 lg:space-y-0">
                <!-- Social media links -->
                <div class="text-md lg:text-xl flex flex-col justify-between items-center">
                    <p class="mb-2 font-semibold">Follow <span class="text-systemYellow">The System</span> for more</p>
                    <div class="flex justify-center lg:justify-start space-x-8 font-semibold">
                        <!-- KitKot -->
                        <a href="https://www.tiktok.com/@thesystemoftheworld" target="_blank" class="animate-underline animate-text-color">
                            TikTok
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@TheSystem_oftheworld" target="_blank" class="animate-underline animate-text-color">
                            YouTube
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/thesystemoftheworld" target="_blank" class="animate-underline animate-text-color">
                            Instagram
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com" target="_blank" class="animate-underline animate-text-color">
                            Facebook
                        </a>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="text-sm mt-6 lg:mt-0">
                    <p class="">&copy; <span id="current-year"></span> <span class="text-systemYellow">The System</span>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // Dynamically update the year
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>

<style>
    /* Styling for social media links */
    .social-link {
        text-transform: uppercase;
        font-weight: 600;
        color: white;
        transition: color 0.3s, transform 0.3s;
    }

    .social-link:hover {
        color: #fbd100; /* Yellow on hover */
        transform: scale(1.1);
    }

    /* Add spacing between social media links */
    .social-link + .social-link {
        margin-left: 1.5rem;
    }
</style>