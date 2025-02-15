// Define a mapping of IDs to theme-specific image paths
const themeImages = {
    'theme-image-header-logo': {
        secondary: '/images/logos/BlueprintHorseFilled.svg',
        primary: '/images/logos/TheSystemHorse.svg',
    },
    'theme-image-header-logo-text': {
        secondary: '/images/logos/BlueprintText.svg',
        primary: '/images/logos/TheSystemText.svg',
    },
    'theme-image-header-crypto': {
        secondary: '/images/logos/BlueprintCrypto.svg',
        primary: '/images/logos/TheSystemCrypto.svg',
    },
    'theme-image-footer-crypto-flipped-desktop': {
        secondary: '/images/logos/TheSystemCrypto.svg',
        primary: '/images/logos/BlueprintCrypto.svg',
    },
    'theme-image-footer-crypto-flipped-mobile': {
        secondary: '/images/logos/TheSystemCrypto.svg',
        primary: '/images/logos/BlueprintCrypto.svg',
    },
    'theme-image-homepage-logo-full': {
        secondary: '/images/logos/BlueprintFull.svg',
        primary: '/images/logos/TheSystemFull.svg',
    },
    'theme-image-contact-logo-full': {
        secondary: '/images/logos/BlueprintFull.svg',
        primary: '/images/logos/TheSystemFull.svg',
    },
    // Add more images as needed
};

// Function to update images based on theme
export function updateThemeImage(theme) {
    Object.entries(themeImages).forEach(([id, paths]) => {
        const imageElement = document.getElementById(id);

        if (imageElement) {
            // Update the image's `src` or `href` attribute based on the theme
            imageElement.setAttribute('href', paths[theme]); // Use `src` if it's an <img> element
        }
    });
}