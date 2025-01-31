import './bootstrap';
import './config/theme.js';  // Import theme functions
import './config/theme-images.js';

document.getElementById('current-year').textContent = new Date().getFullYear();

// Import functions from theme.js and cookie.js
import { setCookie, getCookie } from './services/cookie.js';
import { setTheme } from './config/theme.js';

// Function to apply the stored theme from the cookie on page load
function applyStoredThemeFromCookie() {
    let currentTheme = getCookie("theme");
    if (currentTheme === "yellow") {
        setTheme('yellow');
    } else if (currentTheme === "blue") {
        setTheme('blue');
    }
}

// Function to toggle the theme and store it in the cookie
function toggleTheme() {
    let currentTheme = getCookie("theme");
    let newTheme = currentTheme === "yellow" ? "blue" : "yellow";
    
    // Set the new theme
    setTheme(newTheme);
    
    // Store the new theme in the cookie
    setCookie("theme", newTheme, 30);
}

// Event listener to handle the theme switching button click
document.addEventListener('DOMContentLoaded', () => {
    // Apply the stored theme when the page loads
    applyStoredThemeFromCookie();

    const themeToggleButtons = document.querySelectorAll('.theme-toggle');
    if (themeToggleButtons.length) {
        themeToggleButtons.forEach((themeToggleButton) => {
            themeToggleButton.addEventListener('click', toggleTheme);
        });
    } else {
        console.error('Theme toggle button not found!');
    }
});