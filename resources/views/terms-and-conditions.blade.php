@extends('layouts.app')

@section('title', 'Terms & Conditions')

@section('content')

{{-- !! Let erop dat als deze informatie verandert dat de terms-and-conditions.js ook aangepast wordt zodat de download klopt! --}}

<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
  <div class="bg-colorPrimary/60 max-w-4xl mx-auto p-6 text-white">
    <h1 class="text-3xl font-bold text-center mb-6">Terms & Conditions</h1>
    <p class="text-sm text-center">thesystemoftheworld.com</p>
    <p class="text-sm text-center">Laatste bijwerking: 27 augustus 2025</p>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">Inleiding</h2>
      <p>
        Bij JQC Limited (webshop) en The System (website) vinden we het belangrijk dat onze gebruikers duidelijk inzicht hebben in de regels en voorwaarden die van toepassing zijn op het gebruik van onze diensten.
        In deze Terms and Conditions (T&C) leggen we uit welke rechten en plichten jij als gebruiker hebt bij het bezoeken en gebruiken van onze website en webshop. Door gebruik te maken van onze diensten, ga je akkoord met deze T&C.
      </p>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">1. Toepasselijkheid</h2>
      <p>Deze Algemene Voorwaarden zijn van toepassing op alle diensten en producten die worden aangeboden door The System, gevestigd in Groningen (Nederland). Door gebruik te maken van onze diensten of het plaatsen van een bestelling, gaat u akkoord met deze voorwaarden.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">2. Diensten en Producten</h2>
      <p>The System biedt coaching, online cursussen, een-op-een-sessies en fysieke producten zoals kleding, accessoires en kantoorartikelen. Alle diensten en producten worden geleverd zoals omschreven op onze website.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">3. Bestellingen en Betalingen</h2>
      <ul class="list-disc list-inside space-y-2">
        <li>Bestellingen kunnen uitsluitend via onze website worden geplaatst.</li>
        <li>Betaling dient vooraf te geschieden via de aangeboden betaalmethoden.</li>
        <li>Na ontvangst van betaling wordt de bestelling verwerkt en verzonden.</li>
      </ul>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">4. Annuleringen en Retourneren</h2>
      <ul class="list-disc list-inside space-y-2">
        <li>Digitale producten (zoals online cursussen) zijn na aankoop niet retourneerbaar.</li>
        <li>Fysieke producten kunnen binnen 14 dagen na ontvangst worden geretourneerd, mits ongebruikt en in originele verpakking.</li>
        <li>Kosten voor retourzending zijn voor rekening van de klant, tenzij anders overeengekomen.</li>
      </ul>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">5. Beperking van Aansprakelijkheid</h2>
      <h3 class="text-lg font-medium mb-2">5.1 Adviezen en Coaching</h3>
      <p>Alle adviezen, suggesties en coachingdiensten zijn bedoeld als algemene begeleiding en ondersteuning. Wij garanderen niet dat onze adviezen in alle situaties geschikt of effectief zijn. De klant is volledig verantwoordelijk voor het toepassen van de adviezen en het beoordelen van de geschiktheid ervan voor de persoonlijke situatie.</p>
      <p>Wij zijn niet aansprakelijk voor directe of indirecte schade, verlies of gevolgen voortvloeiend uit het opvolgen van onze adviezen.</p>
    </section>

    <section class="mt-8">
      <h3 class="text-lg font-medium mb-2">5.2 Gebruik van Producten</h3>
      <p>Onze producten worden geleverd zoals omschreven op de website. Wij zijn niet verantwoordelijk voor eventuele schade, ongemak of negatieve ervaringen voortvloeiend uit het gebruik van onze producten.</p>
      <p>De klant is verantwoordelijk voor het juist gebruiken van de producten en het naleven van eventuele veiligheidsvoorschriften.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-lg font-semibold mb-2">5.3 Persoonlijke Aansprakelijkheidsbeperking bij Psychisch of Emotioneel Letsel</h2>
      <p>De coachingdiensten van The System zijn niet bedoeld ter vervanging van medische, psychologische of psychiatrische hulp. Hoewel wij streven naar professionele begeleiding, zijn wij niet aansprakelijk voor psychisch of emotioneel letsel voortvloeiend uit het gebruik van onze diensten. De klant blijft te allen tijde zelf verantwoordelijk voor het inschatten van zijn of haar mentale en emotionele gezondheid en het inschakelen van professionele hulp indien nodig.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-lg font-semibold mb-2">5.4 Aansprakelijkheid bij Communicatie Tussen Leden</h2>
      <p>Onze community biedt een platform waar leden met elkaar kunnen communiceren. Hoewel wij streven naar een veilige en respectvolle omgeving, hebben wij geen controle over privéberichten of andere directe interacties tussen leden. The System is niet aansprakelijk voor enige schade, ongemak of negatieve gevolgen voortvloeiend uit privécontacten of het gedrag van andere leden binnen of buiten de community. Wij behouden ons het recht voor om bij klachten achter de schermen actie te ondernemen, maar dit ontslaat de individuele leden niet van hun eigen verantwoordelijkheid in hun communicatie met anderen.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">6. Intellectueel Eigendom</h2>
      <p>Alle inhoud, inclusief teksten, afbeeldingen, en cursusmateriaal, is eigendom van The System en mag niet zonder schriftelijke toestemming worden gekopieerd, gedeeld of commercieel gebruikt.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">7. Wijzigingen en Updates</h2>
      <p>The System behoudt zich het recht voor om deze voorwaarden op elk moment te wijzigen. De meest recente versie wordt altijd op onze website gepubliceerd.</p>
    </section>
    
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">8. Contact</h2>
      <p>Voor vragen of klachten kunt u contact opnemen met onze klantenservice via <a href="mailto:contact@thesystemoftheworld.com" class="animate-underline animate-text-color theme-primary">contact@thesystemoftheworld.com</a></p>
    </section>
    
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">9. Gedragsregels en Fair Use</h2>
      <p>Om een veilige en respectvolle omgeving te waarborgen voor alle gebruikers van onze diensten en eventuele community-platformen, vragen wij het volgende:</p>
      <ul class="list-disc list-inside space-y-2 my-2">
        <li>Behandel andere gebruikers met respect en beleefdheid.</li>
        <li>Gebruik onze platformen niet voor haatzaaiing, intimidatie, spam of andere ongewenste gedragingen.</li>
        <li>Misbruik van toegang tot diensten of communitygedeeltes kan leiden tot waarschuwingen, tijdelijke schorsing of permanente uitsluiting van onze diensten.</li>
      </ul>
      <p>The System behoudt zich het recht voor om accounts te beperken of te verwijderen bij overtreding van deze gedragsregels.</p>
    </section>

    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">10. Wijzigingen</h2>
      <p>
        De Terms & Conditions kunnen van tijd tot tijd worden bijgewerkt. Controleer deze pagina regelmatig om op de hoogte te blijven van eventuele wijzigingen.
      </p>
    </section>

    <footer class="mt-8 text-center text-sm">
      <p>Heb je vragen over onze Terms & Conditions? Neem contact met ons op via: <a href="mailto:contact@thesystemoftheworld.com" class="animate-underline animate-text-color theme-primary">contact@thesystemoftheworld.com</a></p>
      <p>
        Wil je de Terms & Conditions downloaden voor later gebruik?
        <button id="downloadTCBtn" class="animate-underline animate-text-color theme-primary">
          Download Terms & Conditions PDF
        </button>
      </p>
    </footer>
    {{-- <p class="mt-8">**The System**<br>
    [Kamer van Koophandel nummer]<br>
    [Bedrijfsadres]<br>
    <a href="mailto:contact@thesystemoftheworld.com" class="animate-underline animate-text-color theme-primary">contact@thesystemoftheworld.com</a><br>
    [Telefoonnummer]</p> --}}
  </div>
</div>

@endsection