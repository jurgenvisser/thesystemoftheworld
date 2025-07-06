@auth
    <div class="relative" x-data="{ open: false }">
        <!-- Trigger Button -->
        <button
            @click="open = !open"
            class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-md shadow hover:bg-gray-700 transition"
        >
            <span class="mr-2">{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div
            x-show="open"
            @click.away="open = false"
            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50"
        >
            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Profiel
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                >
                    Uitloggen
                </button>
            </form>
        </div>
    </div>
@endauth