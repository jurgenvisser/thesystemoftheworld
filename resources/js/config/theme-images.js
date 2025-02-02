// Define a mapping of IDs to theme-specific image paths
const themeImages = {
    'theme-image-header-logo': {
        blue: '/images/logos/BlueprintHorseFilled.svg',
        yellow: '/images/logos/TheSystemHorse.svg',
    },
    'theme-image-header-logo-text': {
        blue: '/images/logos/BlueprintText.svg',
        yellow: '/images/logos/TheSystemText.svg',
    },
    'theme-image-header-crypto': {
        blue: '/images/logos/BlueprintCrypto.svg',
        yellow: '/images/logos/TheSystemCrypto.svg',
    },
    'theme-image-footer-crypto-flipped-desktop': {
        blue: '/images/logos/TheSystemCrypto.svg',
        yellow: '/images/logos/BlueprintCrypto.svg',
    },
    'theme-image-footer-crypto-flipped-mobile': {
        blue: '/images/logos/TheSystemCrypto.svg',
        yellow: '/images/logos/BlueprintCrypto.svg',
    },
    'theme-image-homepage-logo-full': {
        blue: '/images/logos/BlueprintFull.svg',
        yellow: '/images/logos/TheSystemFull.svg',
    },
    'theme-image-contact-logo-full': {
        blue: '/images/logos/BlueprintFull.svg',
        yellow: '/images/logos/TheSystemFull.svg',
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