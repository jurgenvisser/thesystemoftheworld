import './bootstrap';
import './config/theme.js';
import './config/theme-images.js';
import './utils/mobile-menu.js';
import './utils/testing-menu.js';
import './utils/scrolling-banner.js';
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



if (!window.popupInitialized) {
    window.popupInitialized = true;

    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('popup');
        const closePopup = document.getElementById('closePopup');

        // const popupContent = popup.querySelector('div.relative'); / select the popup content div by class

        function overlayClickHandler(event) {
            if (event.target === popup) {
                popup.classList.add('hidden');
                popup.removeEventListener('click', overlayClickHandler);
            }
        }

        popup.addEventListener('click', overlayClickHandler);

        if (popup && closePopup) {
            const popupKey = "popupLastShown";
            const popupDisplayDelay = 200; // 2 seconds for development
            const oneDayInMilliseconds = 24 * 60 * 60 * 1000;

            // Function to get a cookie value by name
            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }

            // Function to set a cookie
            function setCookie(name, value, days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
            }

            // Function to check if popup should show
            function shouldShowPopup() {
                const lastShown = getCookie(popupKey);
                if (!lastShown) return true;

                const lastShownTime = new Date(lastShown).getTime();
                const currentTime = new Date().getTime();

                return currentTime - lastShownTime >= oneDayInMilliseconds;
            }

            // Show the popup after delay if conditions are met
            // if (shouldShowPopup()) {
                setTimeout(() => {
                    popup.classList.remove('hidden');
                    setCookie(popupKey, new Date().toISOString(), 1); // Store for 1 day
                }, popupDisplayDelay);
            // }

            // Close the popup on button click
            closePopup.addEventListener('click', () => {
                popup.classList.add('hidden');
            });
        }
    });
}