// Import the generateSelectors function from the selectors file
import { generateSelectors, defaultOpacities, defaultColorClasses, defaultElementTypes } from '../utils/selectors';
import { updateThemeImage } from './theme-images.js';

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
                if (theme === "primary") {
                    // Switching to primary theme
                    if (el.classList.contains(`bg-${colorClass}`)) {
                        el.classList.replace(`bg-${colorClass}`, `bg-colorPrimary`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`bg-${colorClass}/${opacity}`, `bg-colorPrimary/${opacity}`);
                        }
                        if (el.classList.contains(`border-${colorClass}/${opacity}`)) {
                            el.classList.replace(`border-${colorClass}/${opacity}`, `border-colorPrimary/${opacity}`);
                        }
                    });
                    if (el.classList.contains(`text-${colorClass}`)) {
                        el.classList.replace(`text-${colorClass}`, `text-colorPrimary`);
                    }
                    if (el.classList.contains(`border-${colorClass}`)) {
                        el.classList.replace(`border-${colorClass}`, `border-colorPrimary`);
                    }
                    if (el.classList.contains(`decoration-${colorClass}`)) {
                        el.classList.replace(`decoration-${colorClass}`, 'decoration-colorPrimary');
                    }
                    if (el.classList.contains('theme-secondary')) {
                        el.classList.replace('theme-secondary', 'theme-primary');
                    }
                } else {
                    // Switching to secondary theme
                    if (el.classList.contains(`bg-${colorClass}`)) {
                        el.classList.replace(`bg-${colorClass}`, `bg-colorSecondary`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`bg-${colorClass}/${opacity}`, `bg-colorSecondary/${opacity}`);
                        }
                        if (el.classList.contains(`border-${colorClass}/${opacity}`)) {
                            el.classList.replace(`border-${colorClass}/${opacity}`, `border-colorSecondary/${opacity}`);
                        }
                    });
                    if (el.classList.contains(`text-${colorClass}`)) {
                        el.classList.replace(`text-${colorClass}`, `text-colorSecondary`);
                    }
                    if (el.classList.contains(`border-${colorClass}`)) {
                        el.classList.replace(`border-${colorClass}`, `border-colorSecondary`);
                    }
                    if (el.classList.contains(`decoration-${colorClass}`)) {
                        el.classList.replace(`decoration-${colorClass}`, 'decoration-colorSecondary');
                    }
                    if (el.classList.contains('theme-primary')) {
                        el.classList.replace('theme-primary', 'theme-secondary');
                    }
                }
            });
        });
    });
    updateThemeImage(theme);
}