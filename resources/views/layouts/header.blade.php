<div class="bg-black h-16 flex items-center justify-between px-4 sm:px-8 text-colorLight sticky top-0 z-50">
    <!-- Left Logo Section -->
    <a href="/" aria-label="Go to the homepage via the logo" class="flex items-center">
        <svg class="h-12 xl:h-10 2xl:h-12 w-12 xl:w-10 2xl:w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"> 
            <image id="theme-image-header-logo" href="/images/logos/TheSystemHorse.svg" width="100%" height="100%"/>
        </svg>
        <svg class="h-auto sm:w-72 w-48 xl:w-48 2xl:w-64 3xl:w-72 ml-4">
            <image id="theme-image-header-logo-text" href="/images/logos/TheSystemText.svg" width="100%" height="100%"/>
        </svg>
    </a>

    <!-- Links (Desktop) -->
    <div class="hidden xl:flex justify-center items-center space-x-8 lg:space-x-4 2xl:space-x-6 3xl:space-x-10 mx-4 flex-1">
        @include('layouts.header-menu')
    </div>

    <!-- Right Logo Section -->
    <svg class="h-auto sm:w-72 w-48 xl:w-48 2xl:w-64 3xl:w-72 ml-4 hidden xl:block">
        <image id="theme-image-header-crypto" href="/images/logos/TheSystemCrypto.svg" width="100%" height="100%"/>
    </svg>

    <!-- Hamburger Menu Button (Visible on mobile and below 1600px) -->
    <div class="xl:hidden flex items-center">
        <button id="hamburger-icon" aria-label="Open menu" class="text-colorPrimary focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</div>


{{-- # Mobile Menu is outside of the parent div from the navbar. This is intended and needs to stay this way. --}}
<!-- Mobile Menu (Hidden by default, toggled by hamburger) -->
<div id="mobile-menu" class="xl:hidden w-full bg-black text-colorLight fixed top-16 left-0 hidden max-h-screen overflow-y-auto z-40">
    <div class="flex flex-col space-y-0 py-4">
        @include('layouts.header-menu')
    </div>
</div>