// Function to actually set the theme on the page
export function setTheme(theme) {
    const elementsToToggle = [
        document.body, // The body
        ...document.querySelectorAll(
            '.bg-systemYellow, .bg-systemYellow\\/20, .bg-systemYellow\\/60, .text-systemYellow, .border-systemYellow, .bg-systemBlue, .bg-systemBlue\\/20, .bg-systemBlue\\/60, .text-systemBlue, .border-systemBlue, .animate-underline, .animate-text-color'
        ),
    ];

    elementsToToggle.forEach((el) => {
        if (theme === "yellow") {
            // Switching to yellow theme
            if (el.classList.contains('bg-systemBlue')) {
                el.classList.replace('bg-systemBlue', 'bg-systemYellow');
            }
            if (el.classList.contains('bg-systemBlue/20')) {
                el.classList.replace('bg-systemBlue/20', 'bg-systemYellow/20');
            }
            if (el.classList.contains('bg-systemBlue/60')) {
                el.classList.replace('bg-systemBlue/60', 'bg-systemYellow/60');
            }
            if (el.classList.contains('text-systemBlue')) {
                el.classList.replace('text-systemBlue', 'text-systemYellow');
            }
            if (el.classList.contains('border-systemBlue')) {
                el.classList.replace('border-systemBlue', 'border-systemYellow');
            }
            if (el.classList.contains('border-systemBlue/85')) {
                el.classList.replace('border-systemBlue/85', 'border-systemYellow/85');
            }
            if (el.classList.contains('border-systemBlue/70')) {
                el.classList.replace('border-systemBlue/70', 'border-systemYellow/70');
            }
            if (el.classList.contains('border-systemBlue/55')) {
                el.classList.replace('border-systemBlue/55', 'border-systemYellow/55');
            }
            if (el.classList.contains('border-systemBlue/40')) {
                el.classList.replace('border-systemBlue/40', 'border-systemYellow/40');
            }
            if (el.classList.contains('border-systemBlue/25')) {
                el.classList.replace('border-systemBlue/25', 'border-systemYellow/25');
            }
            if (el.classList.contains('theme-blue')) {
                el.classList.replace('theme-blue', 'theme-yellow');
            }
        } else {
            // Switching to blue theme
            if (el.classList.contains('bg-systemYellow')) {
                el.classList.replace('bg-systemYellow', 'bg-systemBlue');
            }
            if (el.classList.contains('bg-systemYellow/20')) {
                el.classList.replace('bg-systemYellow/20', 'bg-systemBlue/20');
            }
            if (el.classList.contains('bg-systemYellow/60')) {
                el.classList.replace('bg-systemYellow/60', 'bg-systemBlue/60');
            }
            if (el.classList.contains('text-systemYellow')) {
                el.classList.replace('text-systemYellow', 'text-systemBlue');
            }
            if (el.classList.contains('border-systemYellow')) {
                el.classList.replace('border-systemYellow', 'border-systemBlue');
            }
            if (el.classList.contains('border-systemYellow/85')) {
                el.classList.replace('border-systemYellow/85', 'border-systemBlue/85');
            }
            if (el.classList.contains('border-systemYellow/70')) {
                el.classList.replace('border-systemYellow/70', 'border-systemBlue/70');
            }
            if (el.classList.contains('border-systemYellow/55')) {
                el.classList.replace('border-systemYellow/55', 'border-systemBlue/55');
            }
            if (el.classList.contains('border-systemYellow/40')) {
                el.classList.replace('border-systemYellow/40', 'border-systemBlue/40');
            }
            if (el.classList.contains('border-systemYellow/25')) {
                el.classList.replace('border-systemYellow/25', 'border-systemBlue/25');
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