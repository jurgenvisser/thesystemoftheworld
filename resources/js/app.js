import './bootstrap';
import './config/theme.js';
import './config/theme-images.js';
import './utils/mobile-menu.js';
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