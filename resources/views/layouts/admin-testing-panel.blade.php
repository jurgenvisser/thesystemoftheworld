<div class="bg-black h-16 flex items-center justify-between px-4 sm:px-8 text-white sticky top-0 z-50 hidden lg:block">

    <!-- Links (Desktop) Positioned between the two logos -->
    <div class="hidden sm:flex justify-center items-center space-x-4 sm:space-x-8 mx-4 flex-1">
        @include('layouts.admin-testing-panel-menu')
    </div>

</div>

{{-- # Mobile Menu is outside of the parent div from the navbar. This is intended and needs to stay this way. --}}
<!-- Mobile Menu (Hidden by default, toggled by hamburger) -->
<div id="testing-menu" class="sm:hidden w-full bg-black text-white fixed top-16 left-0 hidden max-h-screen overflow-y-auto z-40">
    <div class="flex flex-col space-y-0 py-4">
        @include('layouts.admin-testing-panel-menu')
    </div>
</div>