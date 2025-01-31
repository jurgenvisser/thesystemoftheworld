// Function to actually set the theme on the page
export function setTheme(theme) {
    const elementsToToggle = [
        document.body, // The body
        ...document.querySelectorAll(
            '.bg-systemYellow, ' +
            '.bg-systemYellow\\/20, ' +
            '.bg-systemYellow\\/60, ' +
            '.text-systemYellow, ' +
            '.border-systemYellow, ' +
            '.border-systemYellow\\/25, ' +
            '.border-systemYellow\\/40, ' +
            '.border-systemYellow\\/55, ' +
            '.border-systemYellow\\/70, ' +
            '.border-systemYellow\\/85, ' +
            '.bg-systemBlue, ' +
            '.bg-systemBlue\\/20, ' +
            '.bg-systemBlue\\/60, ' +
            '.text-systemBlue, ' +
            '.border-systemBlue, ' +
            '.border-systemBlue\\/25, ' +
            '.border-systemBlue\\/40, ' +
            '.border-systemBlue\\/55, ' +
            '.border-systemBlue\\/70, ' +
            '.border-systemBlue\\/85, ' +
            '.animate-underline, ' +
            '.animate-text-color'
        ),
    ];

    // Array to store opacity levels for dynamic replacement
    const opacityLevels = [20, 25, 40, 55, 60, 70, 85];

    elementsToToggle.forEach((el) => {
        if (theme === "yellow") {
            // Switching to yellow theme
            if (el.classList.contains('bg-systemBlue')) {
                el.classList.replace('bg-systemBlue', 'bg-systemYellow');
            }
            opacityLevels.forEach((opacity) => {
                if (el.classList.contains(`bg-systemBlue/${opacity}`)) {
                    el.classList.replace(`bg-systemBlue/${opacity}`, `bg-systemYellow/${opacity}`);
                }
                if (el.classList.contains(`border-systemBlue/${opacity}`)) {
                    el.classList.replace(`border-systemBlue/${opacity}`, `border-systemYellow/${opacity}`);
                }
            });
            if (el.classList.contains('text-systemBlue')) {
                el.classList.replace('text-systemBlue', 'text-systemYellow');
            }
            if (el.classList.contains('border-systemBlue')) {
                el.classList.replace('border-systemBlue', 'border-systemYellow');
            }
            if (el.classList.contains('theme-blue')) {
                el.classList.replace('theme-blue', 'theme-yellow');
            }
        } else {
            // Switching to blue theme
            if (el.classList.contains('bg-systemYellow')) {
                el.classList.replace('bg-systemYellow', 'bg-systemBlue');
            }
            opacityLevels.forEach((opacity) => {
                if (el.classList.contains(`bg-systemYellow/${opacity}`)) {
                    el.classList.replace(`bg-systemYellow/${opacity}`, `bg-systemBlue/${opacity}`);
                }
                if (el.classList.contains(`border-systemYellow/${opacity}`)) {
                    el.classList.replace(`border-systemYellow/${opacity}`, `border-systemBlue/${opacity}`);
                }
            });
            if (el.classList.contains('text-systemYellow')) {
                el.classList.replace('text-systemYellow', 'text-systemBlue');
            }
            if (el.classList.contains('border-systemYellow')) {
                el.classList.replace('border-systemYellow', 'border-systemBlue');
            }
            if (el.classList.contains('theme-yellow')) {
                el.classList.replace('theme-yellow', 'theme-blue');
            }
        }
    });
}

// // Function to apply the stored theme from the cookie on page load
// export function applyStoredTheme() {
//     let currentTheme = getCookie("theme");
//     if (currentTheme === "yellow") {
//         setTheme('yellow');
//     } else if (currentTheme === "blue") {
//         setTheme('blue');
//     }
// }