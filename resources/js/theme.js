// Import the generateSelectors function from the selectors file
import { generateSelectors, defaultOpacities, defaultColorClasses, defaultElementTypes } from './utils/selectors';

// Function to actually set the theme on the page
export function setTheme(theme) {
    const elementsToToggle = [
        document.body, // The body
        ...document.querySelectorAll(generateSelectors(defaultColorClasses, defaultOpacities, defaultElementTypes)),
    ];

    elementsToToggle.forEach((el) => {
        // Loop through each of the dynamic color classes and element types
        defaultColorClasses.forEach((colorClass) => {
            defaultElementTypes.forEach((elementType) => {
                if (theme === "yellow") {
                    // Switching to yellow theme
                    if (el.classList.contains(`bg-${colorClass}`)) {
                        el.classList.replace(`bg-${colorClass}`, `bg-systemYellow`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`bg-${colorClass}/${opacity}`, `bg-systemYellow/${opacity}`);
                        }
                        if (el.classList.contains(`border-${colorClass}/${opacity}`)) {
                            el.classList.replace(`border-${colorClass}/${opacity}`, `border-systemYellow/${opacity}`);
                        }
                    });
                    if (el.classList.contains(`text-${colorClass}`)) {
                        el.classList.replace(`text-${colorClass}`, `text-systemYellow`);
                    }
                    if (el.classList.contains(`border-${colorClass}`)) {
                        el.classList.replace(`border-${colorClass}`, `border-systemYellow`);
                    }
                    if (el.classList.contains(`decoration-${colorClass}`)) {
                        el.classList.replace(`decoration-${colorClass}`, 'decoration-systemYellow');
                    }
                    if (el.classList.contains('theme-blue')) {
                        el.classList.replace('theme-blue', 'theme-yellow');
                    }
                } else {
                    // Switching to blue theme
                    if (el.classList.contains(`bg-${colorClass}`)) {
                        el.classList.replace(`bg-${colorClass}`, `bg-systemBlue`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`bg-${colorClass}/${opacity}`, `bg-systemBlue/${opacity}`);
                        }
                        if (el.classList.contains(`border-${colorClass}/${opacity}`)) {
                            el.classList.replace(`border-${colorClass}/${opacity}`, `border-systemBlue/${opacity}`);
                        }
                    });
                    if (el.classList.contains(`text-${colorClass}`)) {
                        el.classList.replace(`text-${colorClass}`, `text-systemBlue`);
                    }
                    if (el.classList.contains(`border-${colorClass}`)) {
                        el.classList.replace(`border-${colorClass}`, `border-systemBlue`);
                    }
                    if (el.classList.contains(`decoration-${colorClass}`)) {
                        el.classList.replace(`decoration-${colorClass}`, 'decoration-systemBlue');
                    }
                    if (el.classList.contains('theme-yellow')) {
                        el.classList.replace('theme-yellow', 'theme-blue');
                    }
                }
            });
        });
    });
}