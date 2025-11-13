<!-- Form Section (6/6) -->
<div class="h-auto lg:h-full col-span-6">
    <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-start text-colorLight p-8 lg:p-20 responsive-height text-left lg:text-justify">

        <!-- Introductory Text -->
        <div class="text-justify">
            <h2 class="text-2xl lg:text-4xl font-bold uppercase font-times">Email formulier</h2>
        </div>

        <!-- Email Form -->
        <form action="https://formsubmit.co/contact@thesystemoftheworld.com" method="POST" class="space-y-2 lg:space-y-4 flex-1 w-full">

            <input type="hidden" name="_next" value="http://127.0.0.1:8000/contact">
            <input type="hidden" name="_autoresponse" value="Dankjewel voor je bericht aan The System! Wij zullen je zo snel mogenlijk een passend antwoord geven.">
            <input type="hidden" name="_template" value="box">
            
            <div class="lg:flex items-center lg:gap-4">
                <input
                    type="text"
                    name="name"
                    placeholder="Naam"
                    class="w-full p-2 mb-2 lg:mb-0 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
                />
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
                />
            </div>
            <div class="lg:flex items-center lg:gap-4">
                <input
                    type="text"
                    name="_subject"
                    placeholder="Onderwerp"
                    class="w-full p-2 mb-2 lg:mb-0 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
                />
                <select
                    name="genderPreference"
                    class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40 appearance-none"
                >
                    <option value="geen-voorkeur" disabled selected>Selecteer een antwoord voorkeur</option>
                    <option value="man">Man</option>
                    <option value="vrouw">Vrouw</option>
                    <option value="geen-voorkeur">Geen voorkeur</option>
                </select>
            </div>
            <textarea
                name="message"
                placeholder="Typ hier uw bericht"
                rows="4"
                class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
            ></textarea>
            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="bg-black text-colorLight rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800"
                    >
                    Verstuur
                </button>
                <p class="text-xs lg:text-sm text-gray-300">
                    *Door het formulier in te vullen en op te sturen ga je akkoord met onze <a href="/privacy-policy" class="animate-underline animate-text-color theme-primary !text-gray-300">Privacy Policy</a> en <a href="/terms-and-conditions" class="animate-underline animate-text-color theme-primary !text-gray-300">Terms & Conditions</a>.
                </p>
            </div>
        </form>
    </div>
</div>