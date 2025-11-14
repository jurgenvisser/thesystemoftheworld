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
        if (el.hasAttribute('data-theme-fixed')) return; // skip elements marked as fixed
        // Loop through each of the dynamic color classes and element types
        defaultColorClasses.forEach((colorClass) => {
            defaultElementTypes.forEach((elementType) => {
                if (theme === "primary") {
                    // Switching to primary theme
                    if (el.classList.contains(`bg-${colorClass}`)) {
                        el.classList.replace(`bg-${colorClass}`, `bg-colorPrimary`);
                    }
                    if (el.classList.contains(`hover:bg-${colorClass}`)) {
                        el.classList.replace(`hover:bg-${colorClass}`, `hover:bg-colorPrimary`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`bg-${colorClass}/${opacity}`, `bg-colorPrimary/${opacity}`);
                        }
                        if (el.classList.contains(`hover:bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`hover:bg-${colorClass}/${opacity}`, `hover:bg-colorPrimary/${opacity}`);
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
                    if (el.classList.contains(`ring-${colorClass}`)) {
                        el.classList.replace(`ring-${colorClass}`, `ring-colorPrimary`);
                    }
                    if (el.classList.contains(`hover:ring-${colorClass}`)) {
                        el.classList.replace(`hover:ring-${colorClass}`, `hover:ring-colorPrimary`);
                    }
                    if (el.classList.contains(`focus:ring-${colorClass}`)) {
                        el.classList.replace(`focus:ring-${colorClass}`, `focus:ring-colorPrimary`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`ring-${colorClass}/${opacity}`)) {
                            el.classList.replace(`ring-${colorClass}/${opacity}`, `ring-colorPrimary/${opacity}`);
                        }
                        if (el.classList.contains(`hover:ring-${colorClass}/${opacity}`)) {
                            el.classList.replace(`hover:ring-${colorClass}/${opacity}`, `hover:ring-colorPrimary/${opacity}`);
                        }
                        if (el.classList.contains(`focus:ring-${colorClass}/${opacity}`)) {
                            el.classList.replace(`focus:ring-${colorClass}/${opacity}`, `focus:ring-colorPrimary/${opacity}`);
                        }
                    });
                    if (el.classList.contains('ring-colorSecondary')) {
                        el.classList.replace('ring-colorSecondary', 'ring-colorPrimary');
                    }
                    if (el.classList.contains('hover:ring-colorSecondary')) {
                        el.classList.replace('hover:ring-colorSecondary', 'hover:ring-colorPrimary');
                    }
                    if (el.classList.contains('focus:ring-colorSecondary')) {
                        el.classList.replace('focus:ring-colorSecondary', 'focus:ring-colorPrimary');
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
                    if (el.classList.contains(`hover:bg-${colorClass}`)) {
                        el.classList.replace(`hover:bg-${colorClass}`, `hover:bg-colorSecondary`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`bg-${colorClass}/${opacity}`, `bg-colorSecondary/${opacity}`);
                        }
                        if (el.classList.contains(`hover:bg-${colorClass}/${opacity}`)) {
                            el.classList.replace(`hover:bg-${colorClass}/${opacity}`, `hover:bg-colorSecondary/${opacity}`);
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
                    if (el.classList.contains(`ring-${colorClass}`)) {
                        el.classList.replace(`ring-${colorClass}`, `ring-colorSecondary`);
                    }
                    if (el.classList.contains(`hover:ring-${colorClass}`)) {
                        el.classList.replace(`hover:ring-${colorClass}`, `hover:ring-colorSecondary`);
                    }
                    if (el.classList.contains(`focus:ring-${colorClass}`)) {
                        el.classList.replace(`focus:ring-${colorClass}`, `focus:ring-colorSecondary`);
                    }
                    defaultOpacities.forEach((opacity) => {
                        if (el.classList.contains(`ring-${colorClass}/${opacity}`)) {
                            el.classList.replace(`ring-${colorClass}/${opacity}`, `ring-colorSecondary/${opacity}`);
                        }
                        if (el.classList.contains(`hover:ring-${colorClass}/${opacity}`)) {
                            el.classList.replace(`hover:ring-${colorClass}/${opacity}`, `hover:ring-colorSecondary/${opacity}`);
                        }
                        if (el.classList.contains(`focus:ring-${colorClass}/${opacity}`)) {
                            el.classList.replace(`focus:ring-${colorClass}/${opacity}`, `focus:ring-colorSecondary/${opacity}`);
                        }
                    });
                    if (el.classList.contains('ring-colorPrimary')) {
                        el.classList.replace('ring-colorPrimary', 'ring-colorSecondary');
                    }
                    if (el.classList.contains('hover:ring-colorPrimary')) {
                        el.classList.replace('hover:ring-colorPrimary', 'hover:ring-colorSecondary');
                    }
                    if (el.classList.contains('focus:ring-colorPrimary')) {
                        el.classList.replace('focus:ring-colorPrimary', 'focus:ring-colorSecondary');
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