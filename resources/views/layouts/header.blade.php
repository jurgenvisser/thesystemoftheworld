<div class="bg-black h-16 flex items-center justify-between px-4 sm:px-8 text-white overflow-hidden">
    <!-- Left Logo Section -->
    <a href="/index" class="flex items-center">
        <div class="h-auto w-12">
            {!! file_get_contents(public_path('images/logos/TheSystemHorse.svg')) !!}
        </div>
        <div class="h-auto w-48 sm:w-72 ml-4">
            {!! file_get_contents(public_path('images/logos/TheSystemText.svg')) !!}
        </div>
    </a>

    <!-- Links (Desktop) Positioned between the two logos -->
    <div class="hidden sm:flex justify-center items-center space-x-4 sm:space-x-8 mx-4 flex-1">
        <a href="/index" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Homepage</a>
        <a href="/brand" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Brand</a>
        <a href="/social-media" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Social Media</a>
        <a href="/visie" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Visie</a>
        <a href="/toekomst" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Toekomst</a>
        <a href="/merchandise" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Merchandise</a>
        <a href="/coming-soon" class="text-sm sm:text-xl font-semibold uppercase text-white hover:text-systemYellow">Coming Soon</a>
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
        <div class="w-full border-b border-t border-systemYellow">
            <a href="/index" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Homepage
            </a>
        </div>
        <div class="w-full border-b border-systemYellow/90">
            <a href="/brand" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Brand
            </a>
        </div>
        <div class="w-full border-b border-systemYellow/80">
            <a href="/social-media" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Social Media
            </a>
        </div>
        <div class="w-full border-b border-systemYellow/70">
            <a href="/visie" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Visie
            </a>
        </div>
        <div class="w-full border-b border-systemYellow/60">
            <a href="/toekomst" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Toekomst
            </a>
        </div>
        <div class="w-full border-b border-systemYellow/50">
            <a href="/merchandise" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Merchandise
            </a>
        </div>
        <div class="w-full border-b border-systemYellow/40">
            <a href="/coming-soon" class="block text-lg font-semibold uppercase text-white hover:text-systemYellow text-center py-2">
                Coming Soon
            </a>
        </div>
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