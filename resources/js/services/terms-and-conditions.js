const downloadBtn = document.getElementById('downloadTCBtn');

if (downloadBtn) {
  downloadBtn.addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    const margin = 10;
    const pageHeight = doc.internal.pageSize.height;
    const pageWidth = doc.internal.pageSize.width;
    const lineHeight = 10;
    let y = margin + 10;
    
    function addText(text, isBold = false, addExtraLine = false) {
      if (addExtraLine) {
        y += lineHeight;
      }
      
      if (isBold) {
        doc.setFont('courier', 'bold');
      } else {
        doc.setFont('courier', 'normal');
      }
      doc.setFontSize(12);
      
      const words = text.split(' ');
      let currentLine = '';
      
      words.forEach(word => {
        const testLine = currentLine + word + ' ';
        const lineWidth = doc.getStringUnitWidth(testLine) * doc.getFontSize() / doc.internal.scaleFactor;
        
        if (lineWidth > pageWidth - margin * 2) {
          doc.text(currentLine, margin, y);
          y += lineHeight;
          if (y + lineHeight > pageHeight - margin) {
            doc.addPage();
            y = margin + 10;
          }
          currentLine = word + ' ';
        } else {
          currentLine = testLine;
        }
      });
      
      doc.text(currentLine, margin, y);
      y += lineHeight;
      if (y + lineHeight > pageHeight - margin) {
        doc.addPage();
        y = margin + 10;
      }
    }
    
    doc.setFont('helvetica', 'normal');
    doc.setFontSize(12);
    
    addText("Terms & Conditions thesystemoftheworld.com", true);
    addText("Laatste bijwerking: 4 april 2025");
    const downloadDate = new Date().toLocaleDateString(); // Get the current date
    addText(`Gedownload op: ${downloadDate}`);

    // Inleiding
    addText("Inleiding", true, true);  // Set as heading
    addText("Bij JQC Limited (webshop) en The System (website) vinden we het belangrijk dat onze gebruikers duidelijk inzicht hebben in de regels en voorwaarden die van toepassing zijn op het gebruik van onze diensten. In deze Terms and Conditions (T&C) leggen we uit welke rechten en plichten jij als gebruiker hebt bij het bezoeken en gebruiken van onze website en webshop. Door gebruik te maken van onze diensten, ga je akkoord met deze T&C");
    

    addText("1. Toepasselijkheid", true, true);
    addText("Deze Algemene Voorwaarden zijn van toepassing op alle diensten en producten die worden aangeboden door The System, gevestigd in Groningen (Nederland). Door gebruik te maken van onze diensten of het plaatsen van een bestelling, gaat u akkoord met deze voorwaarden.");
    
    addText("2. Diensten en Producten", true, true);
    addText("The System biedt coaching, online cursussen, een-op-een-sessies en fysieke producten zoals kleding, accessoires en kantoorartikelen. Alle diensten en producten worden geleverd zoals omschreven op onze website.");
    
    addText("3. Bestellingen en Betalingen", true, true);
    addText("Bestellingen kunnen uitsluitend via onze website worden geplaatst. Betaling dient vooraf te geschieden via de aangeboden betaalmethoden. Na ontvangst van betaling wordt de bestelling verwerkt en verzonden.");
    
    addText("4. Annuleringen en Retourneren", true, true);
    addText("Digitale producten (zoals online cursussen) zijn na aankoop niet retourneerbaar. Fysieke producten kunnen binnen 14 dagen na ontvangst worden geretourneerd, mits ongebruikt en in originele verpakking. Kosten voor retourzending zijn voor rekening van de klant, tenzij anders overeengekomen.");
    
    addText("5. Beperking van Aansprakelijkheid", true, true);
    addText("5.1 Adviezen en Coaching", true);
    addText("Alle adviezen, suggesties en coachingdiensten zijn bedoeld als algemene begeleiding en ondersteuning. Wij garanderen niet dat onze adviezen in alle situaties geschikt of effectief zijn. De klant is volledig verantwoordelijk voor het toepassen van de adviezen en het beoordelen van de geschiktheid ervan voor de persoonlijke situatie. Wij zijn niet aansprakelijk voor directe of indirecte schade, verlies of gevolgen voortvloeiend uit het opvolgen van onze adviezen.");
    addText("5.2 Gebruik van Producten", true);
    addText("Onze producten worden geleverd zoals omschreven op de website. Wij zijn niet verantwoordelijk voor eventuele schade, ongemak of negatieve ervaringen voortvloeiend uit het gebruik van onze producten. De klant is verantwoordelijk voor het juist gebruiken van de producten en het naleven van eventuele veiligheidsvoorschriften.");
    addText("5.3 Persoonlijke Aansprakelijkheidsbeperking bij Psychisch of Emotioneel Letsel", true);
    addText("De coachingdiensten van The System zijn niet bedoeld ter vervanging van medische, psychologische of psychiatrische hulp. Hoewel wij streven naar professionele begeleiding, zijn wij niet aansprakelijk voor psychisch of emotioneel letsel voortvloeiend uit het gebruik van onze diensten. De klant blijft te allen tijde zelf verantwoordelijk voor het inschatten van zijn of haar mentale en emotionele gezondheid en het inschakelen van professionele hulp indien nodig.");
    
    addText("6. Intellectueel Eigendom", true, true);
    addText("Alle inhoud, inclusief teksten, afbeeldingen, en cursusmateriaal, is eigendom van The System en mag niet zonder schriftelijke toestemming worden gekopieerd, gedeeld of commercieel gebruikt.");
    
    addText("7. Wijzigingen en Updates", true, true);
    addText("The System behoudt zich het recht voor om deze voorwaarden op elk moment te wijzigen. De meest recente versie wordt altijd op onze website gepubliceerd.");
    
    addText("8. Contact", true, true);
    addText("Voor vragen of klachten kunt u contact opnemen met onze klantenservice via contact@thesystemoftheworld.com");
    
    addText("9. Gedragsregels en Fair Use", true, true);
    addText("Om een veilige en respectvolle omgeving te waarborgen voor alle gebruikers van onze diensten en eventuele community-platformen, vragen wij het volgende: Behandel andere gebruikers met respect en beleefdheid. Gebruik onze platformen niet voor haatzaaiing, intimidatie, spam of andere ongewenste gedragingen. Misbruik van toegang tot diensten of communitygedeeltes kan leiden tot waarschuwingen, tijdelijke schorsing of permanente uitsluiting van onze diensten. The System behoudt zich het recht voor om accounts te beperken of te verwijderen bij overtreding van deze gedragsregels.");

    // Wijzigingen
    addText("9. Wijzigingen", true, true);  // Set as heading
    addText("De Terms & Conditions kunnen van tijd tot tijd worden bijgewerkt. Controleer deze pagina regelmatig om op de hoogte te blijven van eventuele wijzigingen.");

    // Footer
    addText("Heb je vragen over onze Terms & Conditions? Neem contact met ons op via: contact@thesystemoftheworld.com", false, true);
    
    const pdfDownloadDate = new Date().toLocaleDateString().replace(/\//g, '-'); // Hernoem de datum met streepjes
    doc.save(`thesystemoftheworld.com-terms-and-conditions-${pdfDownloadDate}.pdf`);
  });
} else {
  // console.log("Download button not found on this page. Please visit the /terms-and-conditions page to download the PDF.");
}