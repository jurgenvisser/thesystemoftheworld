document.getElementById('downloadBtn').addEventListener('click', () => {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Set margins and other settings
  const margin = 10;
  const pageHeight = doc.internal.pageSize.height;
  const pageWidth = doc.internal.pageSize.width;
  const lineHeight = 10; // Height of each line of text
  let y = margin + 10; // Starting position for text

  // Function to add text with automatic line breaks and new pages if needed
  function addText(text, isBold = false, addExtraLine = false) {
    // Add an extra empty line before headings
    if (addExtraLine) {
      y += lineHeight;
    }

    // Set the font (bold for headings)
    if (isBold) {
      doc.setFont('courier', 'bold');
    } else {
      doc.setFont('courier', 'normal');
    }
    doc.setFontSize(12);

    // Split the text into multiple lines
    const words = text.split(' ');
    let currentLine = '';

    words.forEach(word => {
      const testLine = currentLine + word + ' ';
      const lineWidth = doc.getStringUnitWidth(testLine) * doc.getFontSize() / doc.internal.scaleFactor;

      // If the line is too wide, break it and start a new line
      if (lineWidth > pageWidth - margin * 2) {
        // Add the current line and move the y position down
        doc.text(currentLine, margin, y);
        y += lineHeight;

        // If the text reaches the bottom of the page, add a new page
        if (y + lineHeight > pageHeight - margin) {
          doc.addPage();
          y = margin + 10; // Reset y position to the top of the new page
        }

        currentLine = word + ' '; // Start a new line
      } else {
        currentLine = testLine; // Add the word to the current line
      }
    });

    // Add the last line
    doc.text(currentLine, margin, y);
    y += lineHeight; // Move the y position for the next line

    // If the text reaches the bottom of the page, add a new page
    if (y + lineHeight > pageHeight - margin) {
      doc.addPage();
      y = margin + 10; // Reset y position to the top of the new page
    }
  }

  // Add content to the PDF
  doc.setFont('helvetica', 'normal');
  doc.setFontSize(12);
  
  // Sample text
  addText("Privacy Policy thesystemoftheworld.com", true);
  addText("Laatste bijwerking: 17 maart 2025");

  // Adding the download date
  const downloadDate = new Date().toLocaleDateString(); // Get the current date
  addText(`Gedownload op: ${downloadDate}`);
  
  // Inleiding
  addText("Inleiding", true, true);  // Set as heading
  addText("Bij JQC Limited (webshop) en The System (website) hechten we veel waarde aan de bescherming van jouw persoonsgegevens. In deze Privacy Policy leggen we uit hoe we gegevens verzamelen, verwerken, gebruiken en beschermen. Door gebruik te maken van onze website of webshop, stem je in met deze Privacy Policy.");

  // Gegevens die we verzamelen
  addText("1. Gegevens die we verzamelen", true, true);  // Set as heading
  addText("Contactformulier:");
  addText("• Naam");
  addText("• E-mailadres");
  addText("• Onderwerp");
  addText("• Bericht");
  addText("• Geslachtsvoorkeur voor reactie (alleen als dit veld ingevuld is)");

  addText("Webshopbestellingen:");
  addText("• Voornaam");
  addText("• Achternaam");
  addText("• E-mailadres");
  addText("• Telefoonnummer (alleen bij fysieke producten)");
  addText("• Adresgegevens (alleen bij fysieke producten)");

  // Waarom we gegevens verzamelen
  addText("2. Waarom we gegevens verzamelen", true, true);  // Set as heading
  addText("We verzamelen gegevens voor de volgende doeleinden:");
  addText("• Verwerken van bestellingen: Om jouw bestelling correct en veilig uit te voeren en te leveren.");
  addText("• Vragen en verzoeken: Om te reageren op vragen die via het contactformulier worden gesteld.");
  addText("• Administratieve en wettelijke verplichtingen: Om te voldoen aan belasting- en boekhoudverplichtingen.");
  addText("• Marketingdoeleinden: Alleen met expliciete toestemming gebruiken wij gegevens om klanten op de hoogte te houden van acties of nieuwe producten.");

  // Beveiliging
  addText("3. Beveiliging", true, true);  // Set as heading
  addText("Onze website en webshop zijn voorzien van een SSL-certificaat om jouw gegevens veilig te verzenden. Bestellingsgegevens worden alleen gedeeld met:");
  addText("• BETAALPROVIDERS (voor veilige transacties).");
  addText("• VERZENDPARTNERS en ons warenhuis (voor fysieke producten).");
  addText("Wij verkopen geen gegevens aan derden.");

  // Jouw rechten
  addText("4. Jouw rechten", true, true);  // Set as heading
  addText("Onder zowel de AVG (GDPR) als de CCPA (California Consumer Privacy Act) heb je de volgende rechten:");
  addText("• Recht op inzage: Je mag opvragen welke gegevens wij over jou hebben opgeslagen.");
  addText("• Recht op correctie: Je mag incorrecte gegevens laten corrigeren.");
  addText("• Recht op verwijdering: Je mag je gegevens laten verwijderen, tenzij we deze nodig hebben om aan wettelijke verplichtingen te voldoen.");
  addText("• Recht om bezwaar te maken: Tegen het gebruik van jouw gegevens voor specifieke doeleinden.");
  addText("Voor deze verzoeken kun je contact opnemen via contact@thesystemoftheworld.com.");

  // Bewaartermijn
  addText("5. Bewaartermijn", true, true);  // Set as heading
  addText("• Bestellingsgegevens: Minimaal 7 jaar, zoals vereist voor belastingdoeleinden.");
  addText("• Contactgegevens: Totdat de vraag volledig is afgehandeld.");

  // Cookies en tracking
  addText("6. Cookies en tracking", true, true);  // Set as heading
  addText("Wij maken momenteel beperkt gebruik van cookies:");
  addText("• Functionele cookies: Voor het goed functioneren van de website.");
  addText("• Analytische cookies: Om de prestaties van de website te verbeteren.");
  addText("• Geen marketingcookies.");
  addText("Toekomstige updates over cookies worden vermeld in deze Privacy Policy.");

  // Internationale klanten
  addText("7. Internationale klanten", true, true);  // Set as heading
  addText("Hoewel onze primaire doelgroep Nederlandstalige klanten zijn, kan onze website bezocht worden door klanten buiten Nederland. We hanteren de AVG (GDPR) als standaard voor gegevensbescherming.");

  // Toestemming
  addText("8. Toestemming", true, true);  // Set as heading
  addText("Door een bestelling te plaatsen of een contactformulier in te vullen, geef je toestemming voor het verwerken van jouw gegevens volgens deze Privacy Policy. Een link naar deze Privacy Policy wordt duidelijk vermeld bij deze formulieren.");

  // Wijzigingen
  addText("9. Wijzigingen", true, true);  // Set as heading
  addText("Deze Privacy Policy kan van tijd tot tijd worden bijgewerkt. Controleer deze pagina regelmatig om op de hoogte te blijven van eventuele wijzigingen.");

  // Footer
  addText("Heb je vragen over deze Privacy Policy? Neem contact met ons op via: contact@thesystemoftheworld.com");

  // Save the file as a PDF and trigger the download
  const pdfDownloadDate = new Date().toLocaleDateString().replace(/\//g, '-'); // Hernoem de datum met streepjes
  doc.save(`thesystemoftheworld.com-privacy-policy-${pdfDownloadDate}.pdf`);
});