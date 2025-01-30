<div class="bg-black h-16 flex items-center justify-between px-4 sm:px-8 text-white sticky top-0 z-50">
    <!-- Left Logo Section -->
    <a href="/" class="flex items-center">
        <div class="h-auto w-12">
            {!! file_get_contents(public_path('images/logos/TheSystemHorse.svg')) !!}
        </div>
        <div class="h-auto w-48 sm:w-72 ml-4">
            {!! file_get_contents(public_path('images/logos/TheSystemText.svg')) !!}
        </div>
    </a>

    <!-- Links (Desktop) Positioned between the two logos -->
    <div class="hidden sm:flex justify-center items-center space-x-4 sm:space-x-8 mx-4 flex-1">
        <a href="/" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Homepage</a>
        <a href="/missie-visie" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Missie & Visie</a>
        <a href="/social-media" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Social Media</a>
        <a href="/merchandise" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Merchandise</a>
        <a href="/contact" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Contact</a>
        {{-- <a href="/brand" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Brand</a> --}}
        {{-- <a href="/toekomst" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Toekomst</a> --}}
        {{-- <a href="/coming-soon" class="animate-underline animate-text-color text-sm sm:text-xl font-semibold uppercase">Coming Soon</a> --}}
    </div>

    <!-- Right Logo Section (visible on desktop) -->
    <div class="h-auto w-60 ml-6 hidden lg:block">
        {!! file_get_contents(public_path('images/logos/TheSystemCrypto.svg')) !!}
    </div>

    <!-- Hamburger Menu Button (Visible on mobile) -->
    <div class="sm:hidden flex items-center">
        <button id="hamburger-icon" class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Mobile Menu (Hidden by default, toggled by hamburger) -->
<div id="mobile-menu" class="sm:hidden w-full bg-black text-white absolute top-16 left-0 hidden max-h-screen overflow-y-auto z-50">
    <div class="flex flex-col space-y-0 py-4">
        <div class="border-b border-systemYellow"></div>
        <div class="border-b border-t border-systemYellow/85">
            <a href="/" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Homepage
            </a>
        </div>
        <div class="border-b border-systemYellow/70">
            <a href="/missie-visie" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Missie & Visie
            </a>
        </div>
        <div class="border-b border-systemYellow/55">
            <a href="/social-media" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Social Media
            </a>
        </div>
        <div class="border-b border-systemYellow/40">
            <a href="/merchandise" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Merchandise
            </a>
        </div>
        <div class="border-b border-systemYellow/25">
            <a href="/contact" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Contact
            </a>
        </div>
        {{-- <div class="border-b border-systemYellow/90">
            <a href="/brand" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Brand
            </a>
        </div> --}}
        {{-- <div class="border-b border-systemYellow/60">
            <a href="/toekomst" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Toekomst
            </a>
        </div> --}}
        {{-- <div class="border-b border-systemYellow/40">
            <a href="/coming-soon" class="animate-text-color block text-lg font-semibold uppercase text-center py-2">
                Coming Soon
            </a>
        </div> --}}
    </div>
</div>

<!-- JavaScript to toggle the mobile menu -->
<script>
    const hamburgerIcon = document.getElementById("hamburger-icon");
    const mobileMenu = document.getElementById("mobile-menu");

    hamburgerIcon.addEventListener("click", () => {
        // Toggle the mobile menu visibility
        mobileMenu.classList.toggle("hidden");
    });
</script>