<div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative lg:space-x-10">
    <!-- Text and Form Section -->
    <div class="bg-juriPrimary/60 text-sm lg:text-2xl flex flex-col lg:flex-col justify-between text-white p-8 lg:p-20 py-20 h-auto w-[85vw] lg:w-[40.9vw] text-justify leading-loose relative">

        <!-- Introductory Text -->
        <div class="mb-8 text-justify">
            <h2 class="mb-6 px-4 lg:px-0 text-4xl font-bold uppercase font-times">COntacteer ons</h2>
            <p class="text-base lg:text-lg">
                Heb je vragen, suggesties, of wil je gewoon met ons in contact komen? 
                Gebruik het onderstaande formulier om ons te bereiken. 
                We streven ernaar om binnen 24 uur te reageren. We horen graag van je!
            </p>
        </div>

        <!-- Email Form -->
        <form action="/submit" method="POST" class="space-y-4 flex-1">
            <input
                type="text"
                name="name"
                placeholder="Uw Naam"
                class="w-full p-2 border border-juriPrimary rounded focus:outline-none focus:ring focus:ring-juriPrimary bg-black/40"
            />
            <input
                type="email"
                name="email"
                placeholder="Uw Email"
                class="w-full p-2 border border-juriPrimary rounded focus:outline-none focus:ring focus:ring-juriPrimary bg-black/40"
            />
            <textarea
                name="message"
                placeholder="Uw Bericht"
                rows="4"
                class="w-full p-2 border border-juriPrimary rounded focus:outline-none focus:ring focus:ring-juriPrimary bg-black/40"
            ></textarea>
            <button
                type="submit"
                class="bg-black text-white rounded hover:ring hover:ring-juriPrimary py-2 px-4 hover:bg-gray-800"
            >
                Verstuur
            </button>
        </form>
    </div>
</div>