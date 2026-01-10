import './bootstrap';
import './config/theme.js';
import './config/theme-images.js';
import './utils/mobile-menu.js';
import './utils/popup.js';
import './utils/scroll-to-top.js';
import './utils/testing-menu.js';
import './utils/scrolling-banner.js';
import './services/privacy-policy.js';
import './services/terms-and-conditions.js';
import { initMentorshipModal } from './utils/mentorship-modal.js';
// import './config/scroll-animation.js'; // Momenteel uitgeschakeld
import { setCookie, getCookie } from './services/cookie.js';
import { setTheme } from './config/theme.js';

// GLOBALE STATUS: Houdt het actieve thema bij voor betrouwbare glow-updates
let activeGlowTheme = 'primary'; 

/* =========================================
   HELPER FUNCTIONS (Kleurconversie)
   ========================================= */

// Zet Hex om naar [R, G, B] array
function hexToRGBArray(hex) {
    hex = hex.replace(/['"\s]/g, '').replace("#", "");
    
    if (hex.length === 3) {
        hex = hex.split("").map(c => c + c).join("");
    }
    
    const r = parseInt(hex.substring(0, 2), 16);
    const g = parseInt(hex.substring(2, 4), 16);
    const b = parseInt(hex.substring(4, 6), 16);
    
    return [r, g, b];
}

// Conversie van RGB (0-255) naar HSL (H:0-360, S:0-100, L:0-100)
function RGBtoHSL(r, g, b) {
    r /= 255;
    g /= 255;
    b /= 255;

    let max = Math.max(r, g, b), min = Math.min(r, g, b);
    let h, s, l = (max + min) / 2;

    if (max === min) {
        h = s = 0; // achromatic
    } else {
        let d = max - min;
        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
        switch (max) {
            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
            case g: h = (b - r) / d + 2; break;
            case b: h = (r - g) / d + 4; break;
        }
        h /= 6;
    }
    
    return [
        Math.round(h * 360), 
        Math.round(s * 100), 
        Math.round(l * 100)
    ];
}

// Conversie van HSL (H:0-360, S:0-100, L:0-100) terug naar RGB (0-255)
function HSLtoRGB(h, s, l) {
    h /= 360;
    s /= 100;
    l /= 100;
    let r, g, b;

    if (s === 0) {
        r = g = b = l; // achromatic
    } else {
        const hue2rgb = (p, q, t) => {
            if (t < 0) t += 1;
            if (t > 1) t -= 1;
            if (t < 1 / 6) return p + (q - p) * 6 * t;
            if (t < 1 / 2) return q;
            if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
            return p;
        };
        const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
        const p = 2 * l - q;
        r = hue2rgb(p, q, h + 1 / 3);
        g = hue2rgb(p, q, h);
        b = hue2rgb(p, q, h - 1 / 3);
    }

    return [
        Math.round(r * 255), 
        Math.round(g * 255), 
        Math.round(b * 255)
    ];
}

// Berekent afstand tussen muis en element
function calculateDistance(mouseX, mouseY, rect) {
    const dx = Math.max(rect.left - mouseX, 0, mouseX - rect.right);
    const dy = Math.max(rect.top - mouseY, 0, mouseY - rect.bottom);
    return Math.sqrt(dx * dx + dy * dy);
}

/* =========================================
   CORE LOGIC (met Saturatie en Lichtheid Boost uit CSS)
   ========================================= */

// Berekent en stelt de boosted RGB-waarden in voor een specifiek thema
function calculateAndSetThemeColors(themeName) {
    const root = document.documentElement;
    const rootStyles = getComputedStyle(root);
    const varPrefix = themeName.toLowerCase(); 

    // 1. Haal de Tailwind variabele op (bijv: --colorPrimary)
    const varName = `--color${themeName.charAt(0).toUpperCase() + themeName.slice(1)}`;
    const hex = rootStyles.getPropertyValue(varName).trim();
    if (!hex) return;

    // 2. LEES BOOST FACTOREN UIT CSS-VARIABELEN
    const saturationBoost = parseFloat(rootStyles.getPropertyValue('--border-saturate-boost').trim() || '1.0');
    const lightnessBoost = parseFloat(rootStyles.getPropertyValue('--border-lightness-boost').trim() || '1.0');
    
    // 3. Converteer HEX naar RGB Array
    const [r, g, b] = hexToRGBArray(hex);
    
    // 4. Converteer RGB naar HSL voor manipulatie
    let [h, s, l] = RGBtoHSL(r, g, b);
    
    // 5. Zet de OORSPRONKELIJKE kleur als variabele voor de innerlijke blob
    const originalRgbString = `${r}, ${g}, ${b}`;
    root.style.setProperty(`--glow-${varPrefix}-rgb-blob`, originalRgbString);

    // 6. Pas de boost factoren toe en clamp ze op 100
    s = Math.min(100, Math.round(s * saturationBoost));
    l = Math.min(100, Math.round(l * lightnessBoost));
    
    // 7. Converteer de saturated & bright HSL terug naar RGB
    const [br, bg, bb] = HSLtoRGB(h, s, l);

    // 8. Zet de NIEUWE, verzadigde kleur als variabele voor de border
    const boostedRgbString = `${br}, ${bg}, ${bb}`;
    root.style.setProperty(`--glow-${varPrefix}-rgb-border`, boostedRgbString);
}

// Update alle thema's (Primary en Secondary)
export function updateAllGlowThemeVariables() {
    calculateAndSetThemeColors('primary');
    calculateAndSetThemeColors('secondary');
    
    // initGlowEffect zorgt voor de daadwerkelijke visuele update
    initGlowEffect(); 
}

function initGlowEffect() {
    const cards = document.querySelectorAll('.glow-card');
    
    const MAX_BORDER_OPACITY = 1.0; 
    const MAX_BLOB_OPACITY = 0.5;   
    const PROXIMITY_RANGE = 500; 

    if (cards.length === 0) return;

    let rafId = null;
    let lastEvent = null;

    const updateGlow = () => {
        if (!lastEvent) {
            rafId = null;
            return;
        }

        const e = lastEvent;

        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            
            // Positie muis t.o.v. kaart (voor de blob positie)
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            // Afstand muis tot rand kaart (voor de opacity)
            const distance = calculateDistance(e.clientX, e.clientY, rect);
            
            let interactiveFactor = 0;
            if (distance === 0) {
                interactiveFactor = 1.0; 
            } else if (distance < PROXIMITY_RANGE) {
                interactiveFactor = 1.0 - (distance / PROXIMITY_RANGE);
            }

            const cardStyles = getComputedStyle(card); 
            const defaultOpacityString = cardStyles.getPropertyValue('--default-opacity').trim() || '0';
            const defaultOpacity = parseFloat(defaultOpacityString);
            const disableBorderGlow = cardStyles.getPropertyValue('--disable-border-glow').trim() === '1';

            const finalFactor = Math.max(interactiveFactor, defaultOpacity / MAX_BLOB_OPACITY); 
            const finalBlobOpacity = finalFactor * MAX_BLOB_OPACITY;
            
            let finalBorderOpacity = finalFactor * MAX_BORDER_OPACITY;
            
            if (disableBorderGlow) {
                finalBorderOpacity = 0;
            }

            // --- DE GEFIXTE LOGICA VOOR THEMA SELECTIE ---
            const themeOverride = card.getAttribute('data-glow-theme');
            let blobRgbVar, borderRgbVar;

            if (themeOverride === 'secondary') {
                // VAST SECONDARY THEMA (voor de 3 modules)
                blobRgbVar = 'var(--glow-secondary-rgb-blob)';
                borderRgbVar = 'var(--glow-secondary-rgb-border)';
            } else {
                // DYNAMISCH THEMA (voor de rest van de website)
                // Gebruik de actieve, betrouwbare globale variabele!
                const themePrefix = activeGlowTheme.toLowerCase() === 'secondary' ? 'secondary' : 'primary';

                blobRgbVar = `var(--glow-${themePrefix}-rgb-blob)`;
                borderRgbVar = `var(--glow-${themePrefix}-rgb-border)`;
            }
            
            // ZET DEZE VARIABELEN LOKAAL OP DE KAART
            card.style.setProperty('--card-glow-rgb-blob', blobRgbVar);
            card.style.setProperty('--card-glow-rgb-border', borderRgbVar);
            
            // Update CSS variabelen op de kaart
            card.style.setProperty('--pointer-x', `${x}px`);
            card.style.setProperty('--pointer-y', `${y}px`);
            
            card.style.setProperty('--current-blob-opacity', finalBlobOpacity);
            card.style.setProperty('--current-border-opacity', finalBorderOpacity);
        });

        lastEvent = null; 
        rafId = requestAnimationFrame(updateGlow);
    };

    document.addEventListener('mousemove', (e) => {
        lastEvent = e;
        if (rafId === null) {
            rafId = requestAnimationFrame(updateGlow);
        }
    });

    document.addEventListener('mouseleave', () => {
        if (rafId !== null) {
            cancelAnimationFrame(rafId);
            rafId = null;
            // Dwing een laatste update af om opaciteit op 0 te zetten (net buiten beeld)
            lastEvent = { clientX: -PROXIMITY_RANGE * 2, clientY: -PROXIMITY_RANGE * 2 };
            updateGlow(); 
        }
    });
}

/* =========================================
   THEME & INIT HANDLERS
   ========================================= */

function applyStoredThemeFromCookie() {
    const currentTheme = getCookie("theme") || 'primary'; 
    setTheme(currentTheme); // Stelt data-theme attribuut in
    activeGlowTheme = currentTheme; // Update de betrouwbare statusvariabele
    
    // Wacht heel even zodat de DOM update klaar is en CSS variabelen beschikbaar zijn
    setTimeout(() => {
        updateAllGlowThemeVariables(); 
    }, 10);
}

function toggleTheme() {
    const currentTheme = getCookie("theme");
    const newTheme = currentTheme === "primary" ? "secondary" : "primary";
    
    setTheme(newTheme);
    activeGlowTheme = newTheme; // Update de betrouwbare statusvariabele
    updateAllGlowThemeVariables(); 
    setCookie("theme", newTheme, 30);
}

// Main entry point
document.addEventListener('DOMContentLoaded', () => {
    // 1. Zet datum
    const yearEl = document.getElementById('current-year');
    if(yearEl) yearEl.textContent = new Date().getFullYear();

    // 2. Init Theme (Dit vult activeGlowTheme en start de glow init)
    applyStoredThemeFromCookie();
    
    // 3. Bind Toggle Buttons
    const themeToggleButtons = document.querySelectorAll('.theme-toggle');
    themeToggleButtons.forEach((button) => {
        button.addEventListener('click', toggleTheme);
    });

    // Init Mentorship Modal
    initMentorshipModal();

    // Laad de glow effecten van de sticky discord button
    if(typeof initGlowEffect === 'function') initGlowEffect();

    const videoElement = document.getElementById('quinn-video-background');
        
    console.log('DOMContentLoaded.'); 
    if (videoElement) {
        console.log('Video gevonden.'); 
        
        // 1. Voeg een event listener toe die wacht tot de video metadata geladen is
        videoElement.addEventListener('loadedmetadata', function() {
            
            // 2. Stel de snelheid pas HIER in (0.5 = halve snelheid)
            videoElement.playbackRate = 0.65;
            
            // Optioneel: Voeg een extra check toe in de console om te zien of het gelukt is
            console.log('Video Playback Rate succesvol aangepast in Safari.'); 
        });

        // TIP: Soms helpt het in Safari om de video handmatig te "activeren"
        // Dit is meestal niet nodig, maar kan een laatste redmiddel zijn.
        // videoElement.play().catch(e => console.error("Video play error:", e)); 
    }

    const elements = document.querySelectorAll('.animate-on-scroll');
    const observerOptions = {
        root: null, // De viewport is de root
        rootMargin: '0px',
        threshold: 0.2 // Trigger wanneer 20% van het element zichtbaar is
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Element komt in beeld
                entry.target.classList.add('is-visible');
                entry.target.classList.remove('is-not-visible');
            } else {
                // Element is uit beeld, en moet uitfaden als fade-out-on-leave is ingesteld
                if (entry.target.classList.contains('fade-out-on-leave')) {
                    entry.target.classList.add('is-not-visible');
                    entry.target.classList.remove('is-visible');
                }
            }
        });
    }, observerOptions);

    elements.forEach(element => {
        observer.observe(element);
    });
});