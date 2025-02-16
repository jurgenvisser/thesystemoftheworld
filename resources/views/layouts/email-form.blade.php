 <!-- Text Section (3/6) -->
 <div class="h-auto lg:h-full col-span-3 flex">
    <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
        <!-- Content goes here -->
        <div class="">
            <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Contact The System</h1>
            <p class="text-base lg:text-lg mb-6">
                Heb je vragen, suggesties, of wil je gewoon met ons in contact komen? 
                Gebruik het email formulier om ons te bereiken via email. 
                We streven ernaar om binnen 24 uur te reageren. We horen graag van je!
            </p>
            <h1 class="mb-8 mt-12 px-4 lg:px-0 text-2xl font-bold  font-times">Liever Direct Messaging?</h1>
            <p class="text-base lg:text-lg">
                Als e-mailen niet jouw ding is of je een snellere manier zoekt om contact op te nemen, stuur me gerust een direct bericht op TikTok, Instagram of Facebook. 
                Of je nu vragen hebt, iets wilt delen of gewoon hallo wilt zeggen, ik hoor graag van je! Je vindt de links naar mijn socialmedia-profielen op de pagina Social Media.
            </p>
        </div>

    </div>
</div>

<!-- Form Section (3/6) -->
<div class="h-auto lg:h-full col-span-3">
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
            <input
                type="text"
                name="_subject"
                placeholder="Onderwerp"
                class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40"
            />
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
                {{-- <div class="flex-1">
                    <select
                        name="genderPreference"
                        class="w-full p-2 border border-colorPrimary rounded focus:outline-none focus:ring focus:ring-colorPrimary bg-black/40 appearance-none"
                    >
                        <option value="geen-voorkeur" disabled selected>Selecteer een antwoord voorkeur</option>
                        <option value="man">Man</option>
                        <option value="vrouw">Vrouw</option>
                        <option value="geen-voorkeur">Geen voorkeur</option>
                    </select>
                </div> --}}
            </div>
            {{-- <button
                type="submit"
                class="bg-black text-white rounded hover:ring hover:ring-colorPrimary py-2 px-4 hover:bg-gray-800"
            >
                Verstuur
            </button> --}}
        </form>
    </div>
</div>

