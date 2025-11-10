<div id="comparePopup" class="fixed inset-0 bg-colorPrimary/30 backdrop-blur flex items-center justify-center hidden z-50">
    <div class="relative bg-black p-6 rounded-lg shadow-lg w-10/12 max-w-2xl text-center">
        <button id="closeComparePopup" class="absolute top-4 right-6 text-white text-2xl font-bold hover:text-colorPrimary" aria-label="Close popup">
            &times;
        </button>
        <h2 class="text-white text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold mb-4 lg:mb-8">
            Vergelijk de pakketten
        </h2>
        @include('layouts.coaching-table')
    </div>
</div>