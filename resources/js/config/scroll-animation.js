// scroll-animation.js

// Dit script beheert een scroll-gebaseerde animatie waarbij een reeks afbeeldingen
// wordt weergegeven op een canvas terwijl de gebruiker door een specifieke container scrolt.

// Aantal frames (115)
const frameCount = 115;

// Pad naar de frames in de public-map
const imagesPath = '/images/appleLogoSequence/frame_'; 

// De canvas en de 2D context
const canvas = document.getElementById('animation-canvas');
if (!canvas) {
    // console.warn('scroll-animation.js: #animation-canvas not found — script disabled.');
} else {
    const context = canvas.getContext('2d');

    // De container die de scrollruimte creëert
    const scrollContainer = document.querySelector('.scroll-animation-container');

    // Array om de Image objecten op te slaan
    const loadedImages = [];

    // Zorg dat de canvas de juiste grootte heeft (op basis van je frame-grootte)
    // Voor een responsieve aanpak kun je dit dynamisch instellen
    canvas.width = 1200; 
    canvas.height = 800; 

    // Functie om het bestandspad te genereren (000, 001, ..., 113)
    const getFramePath = index => {
        // Gebruik padStart om het nummer met nullen aan te vullen (e.g., 5 -> "005")
        const paddedIndex = String(index).padStart(3, '0');
        return `${imagesPath}${paddedIndex}.png`;
    };


    // Laad alle afbeeldingen vooraf


    let imagesLoadedCount = 0;

    for (let i = 0; i < frameCount; i++) {
        const img = new Image();
        img.onload = () => {
            imagesLoadedCount++;
            if (imagesLoadedCount === frameCount) {
                console.log('Alle frames zijn succesvol geladen!');
                // Start de animatie alleen als alles geladen is
                requestAnimationFrame(render);
            }
        };
        img.src = getFramePath(i);
        loadedImages.push(img);
    }


    // Render functie die wordt aangeroepen bij elke frame


    function render() {
        // 1. Bereken de progressie (0 tot 1)
        
        // Bepaal de afstand die gescrold is vanaf de start van de container
        const scrolledY = window.scrollY - scrollContainer.offsetTop;

        // Bepaal de totale scrollbare hoogte binnen de container
        // (Container hoogte - viewport hoogte)
        const maxScrollHeight = scrollContainer.scrollHeight - window.innerHeight;

        // Scroll progressie (clamped tussen 0 en 1)
        const scrollProgress = Math.max(0, Math.min(1, scrolledY / maxScrollHeight));

        // 2. Map progressie naar framenummer
        const frameIndex = Math.floor(scrollProgress * (frameCount - 1));

        // 3. Teken het frame
        // We tekenen alleen als de afbeelding in de geladen array bestaat
        if (loadedImages[frameIndex]) {
            // Wis het canvas
            context.clearRect(0, 0, canvas.width, canvas.height); 
            // Teken het juiste frame op het canvas
            context.drawImage(loadedImages[frameIndex], 0, 0, canvas.width, canvas.height);
        }
        
        // Vraag de browser om de functie opnieuw uit te voeren bij de volgende verversing
        requestAnimationFrame(render);
    }

    // De initialisatie van de requestAnimationFrame(render) gebeurt nu na het laden.
    // Voor het geval de frames al geladen zijn voordat de gebruiker scrollt:
    // window.addEventListener('scroll', () => requestAnimationFrame(render));
    // De requestAnimationFrame(render) in de load-loop is efficiënter!
}