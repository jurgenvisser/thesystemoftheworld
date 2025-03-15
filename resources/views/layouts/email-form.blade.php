

<!-- Form Section (6/6) -->
<div class="h-auto lg:h-full col-span-6">
    <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-start text-white p-8 lg:p-20 py-20 text-left lg:text-justify">

        <!-- Introductory Text -->
        <div class="text-justify">
            <h2 class="px-4 lg:px-0 text-4xl font-bold uppercase font-times">Email formulier</h2>
        </div>

        <!-- Email Form -->
        <form action="https://formsubmit.co/contact@theofficialjuri.com" method="POST" class="space-y-4 flex-1 w-full">

            <input type="hidden" name="_next" value="http://127.0.0.1:8000/contact">
            <input type="hidden" name="_autoresponse" value="Dankjewel voor je bericht aan The System! Wioj zullen je zo snel mogenlijk een passend antwoord geven.">
            <input type="hidden" name="_template" value="box">
            
            <div class="flex items-center gap-4">
                <input
                    type="text"
                    name="name"
                    placeholder="Naam"
                    class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
                />
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
                />
            </div>
            <div class="flex items-center gap-4">
                <input
                    type="text"
                    name="_subject"
                    placeholder="Onderwerp"
                    class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
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
                    class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800"
                >
                    Verstuur
                </button>
        </form>
    </div>
</div>

