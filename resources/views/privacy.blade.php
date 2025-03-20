@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

{{-- !! Let erop dat als deze informatie veranderd dat de privacypolicy.js ook aangepast word zodat de doawnload klopt! --}}

<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
  <div class="bg-colorPrimary/60 max-w-4xl mx-auto p-6 text-white">
    <h1 class="text-3xl font-bold text-center mb-6">Privacy Policy</h1>
    <p class="text-sm text-center">thesystemoftheworld.com</p>
    <p class="text-sm text-center">Laatste bijwerking: 17 maart 2025</p>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">Inleiding</h2>
      <p>
        Bij JQC Limited (webshop) en The System (website) hechten we veel waarde aan de bescherming van jouw persoonsgegevens.
        In deze Privacy Policy leggen we uit hoe we gegevens verzamelen, verwerken, gebruiken en beschermen. Door gebruik te maken van onze website of webshop, stem je in met deze Privacy Policy.
      </p>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">1. Gegevens die we verzamelen</h2>
      <h3 class="text-lg font-medium mb-2">Contactformulier:</h3>
      <ul class="list-disc list-inside space-y-2">
        <li>Naam</li>
        <li>E-mailadres</li>
        <li>Onderwerp</li>
        <li>Bericht</li>
        <li>Geslachtsvoorkeur voor reactie (alleen als dit veld ingevuld is)</li>
      </ul>
  
      <h3 class="text-lg font-medium mt-6 mb-2">Webshopbestellingen:</h3>
      <ul class="list-disc list-inside space-y-2">
        <li>Voornaam</li>
        <li>Achternaam</li>
        <li>E-mailadres</li>
        <li>Telefoonnummer (alleen bij fysieke producten)</li>
        <li>Adresgegevens (alleen bij fysieke producten)</li>
      </ul>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">2. Waarom we gegevens verzamelen</h2>
      <p>We verzamelen gegevens voor de volgende doeleinden:</p>
      <ul class="list-disc list-inside space-y-2">
        <li>Verwerken van bestellingen: Om jouw bestelling correct en veilig uit te voeren en te leveren.</li>
        <li>Vragen en verzoeken: Om te reageren op vragen die via het contactformulier worden gesteld.</li>
        <li>Administratieve en wettelijke verplichtingen: Om te voldoen aan belasting- en boekhoudverplichtingen.</li>
        <li>Marketingdoeleinden: Alleen met expliciete toestemming gebruiken wij gegevens om klanten op de hoogte te houden van acties of nieuwe producten.</li>
      </ul>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">3. Beveiliging</h2>
      <p>
        Onze website en webshop zijn voorzien van een SSL-certificaat om jouw gegevens veilig te verzenden. Bestellingsgegevens worden alleen gedeeld met:
      </p>
      <ul class="list-disc list-inside space-y-2">
        <li>Betaalproviders (voor veilige transacties).</li>
        <li>Verzendpartners en ons warenhuis (voor fysieke producten).</li>
      </ul>
      <p>Wij verkopen geen gegevens aan derden.</p>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">4. Jouw rechten</h2>
      <p>
        Onder zowel de AVG (GDPR) als de CCPA (California Consumer Privacy Act) heb je de volgende rechten:
      </p>
      <ul class="list-disc list-inside space-y-2">
        <li>Recht op inzage: Je mag opvragen welke gegevens wij over jou hebben opgeslagen.</li>
        <li>Recht op correctie: Je mag incorrecte gegevens laten corrigeren.</li>
        <li>Recht op verwijdering: Je mag je gegevens laten verwijderen, tenzij we deze nodig hebben om aan wettelijke verplichtingen te voldoen.</li>
        <li>Recht om bezwaar te maken: Tegen het gebruik van jouw gegevens voor specifieke doeleinden.</li>
      </ul>
      <p>Voor deze verzoeken kun je contact opnemen via <a href="mailto:contact@thesystemoftheworld.com" class="animate-underline animate-text-color theme-primary">contact@thesystemoftheworld.com</a>.</p>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">5. Bewaartermijn</h2>
      <ul class="list-disc list-inside space-y-2">
        <li>Bestellingsgegevens: Minimaal 7 jaar, zoals vereist voor belastingdoeleinden.</li>
        <li>Contactgegevens: Totdat de vraag volledig is afgehandeld.</li>
      </ul>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">6. Cookies en tracking</h2>
      <p>Wij maken momenteel beperkt gebruik van cookies:</p>
      <ul class="list-disc list-inside space-y-2">
        <li>Functionele cookies: Voor het goed functioneren van de website.</li>
        <li>Analytische cookies: Om de prestaties van de website te verbeteren.</li>
        <li>Geen marketingcookies.</li>
      </ul>
      <p>Toekomstige updates over cookies worden vermeld in deze Privacy Policy.</p>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">7. Internationale klanten</h2>
      <p>
        Hoewel onze primaire doelgroep Nederlandstalige klanten zijn, kan onze website bezocht worden door klanten buiten Nederland. We hanteren de AVG (GDPR) als standaard voor gegevensbescherming.
      </p>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">8. Toestemming</h2>
      <p>
        Door een bestelling te plaatsen of een contactformulier in te vullen, geef je toestemming voor het verwerken van jouw gegevens volgens deze Privacy Policy. Een link naar deze Privacy Policy wordt duidelijk vermeld bij deze formulieren.
      </p>
    </section>
  
    <section class="mt-8">
      <h2 class="text-xl font-semibold mb-4">9. Wijzigingen</h2>
      <p>
        Deze Privacy Policy kan van tijd tot tijd worden bijgewerkt. Controleer deze pagina regelmatig om op de hoogte te blijven van eventuele wijzigingen.
      </p>
    </section>
  
    <footer class="mt-8 text-center text-sm">
      <p>Heb je vragen over deze Privacy Policy? Neem contact met ons op via: <a href="mailto:contact@thesystemoftheworld.com" class="animate-underline animate-text-color theme-primary">contact@thesystemoftheworld.com</a></p>
      <p>
        Wil je de Privacy Policy downloaden voor later gebruik?
        <button id="downloadBtn" class="animate-underline animate-text-color theme-primary">
          Download Privacy Policy PDF
        </button>
      </p>
    </footer>
  </div>
</div>

@endsection