import './bootstrap';
import './config/theme.js';
import './config/theme-images.js';
import './utils/mobile-menu.js';
import './utils/testing-menu.js';
import './services/privacy-policy.js';
import './services/terms-and-conditions.js';
import { setCookie, getCookie } from './services/cookie.js';
import { setTheme } from './config/theme.js';

document.getElementById('current-year').textContent = new Date().getFullYear();


// Function to apply the stored theme from the cookie on page load
function applyStoredThemeFromCookie() {
    const currentTheme = getCookie("theme");
    if (currentTheme === "primary") {
        setTheme('primary');
    } else if (currentTheme === "secondary") {
        setTheme('secondary');
    }
}

// Function to toggle the theme and store it in the cookie
function toggleTheme() {
    const currentTheme = getCookie("theme");
    const newTheme = currentTheme === "primary" ? "secondary" : "primary";
    // Set the new theme
    setTheme(newTheme);

    
    // Store the new theme in the cookie (encrypted)
    setCookie("theme", newTheme, 30);
}

// Event listener to handle the theme switching button click
document.addEventListener('DOMContentLoaded', () => {
    applyStoredThemeFromCookie();

    const themeToggleButtons = document.querySelectorAll('.theme-toggle');
    themeToggleButtons.forEach((button) => {
        button.addEventListener('click', toggleTheme);
    });
});



document.addEventListener("DOMContentLoaded", () => {
    const marquee = document.getElementById("marquee");
    const container = marquee.parentElement;

    const duplicateContent = () => {
        const containerWidth = container.offsetWidth;
        let marqueeWidth = marquee.scrollWidth;

        // Duplicate content until the total width is at least twice the container width
        while (marqueeWidth < containerWidth * 2) {
            const children = [...marquee.children];
            children.forEach((item) => {
                const clone = item.cloneNode(true);
                marquee.appendChild(clone);
            });
            marqueeWidth = marquee.scrollWidth;
        }
    };

    duplicateContent();

    // Calculate animation duration dynamically
    const totalWidth = marquee.scrollWidth;
    const speed = 100; // Adjust this value for desired scrolling speed
    const duration = totalWidth / speed;

    marquee.style.animation = `marquee ${duration}s linear infinite`;
});