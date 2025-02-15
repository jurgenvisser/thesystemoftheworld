// utils/selectors.js

// Default values for opacities, color classes, and element types
const defaultOpacities = ['20', '25', '40', '55', '60', '70', '85'];
const defaultColorClasses = ['colorPrimary', 'colorSecondary'];
const defaultElementTypes = ['bg', 'border', 'text', 'decoration'];

// Function to dynamically generate class selectors based on color, opacity, and element types
const generateSelectors = (colorClasses = defaultColorClasses, opacities = defaultOpacities, elementTypes = defaultElementTypes) => {
    let selectors = [];
    
    // Loop through each color
    colorClasses.forEach(color => {
        // Loop through each element type (bg, text, border, decoration)
        elementTypes.forEach(type => {
            // Add the basic color class (e.g. .bg-colorPrimary, .text-colorPrimary)
            selectors.push(`.${type}-${color}`);

            // Add the opacity variations for bg and border classes (e.g. .bg-colorPrimary/20)
            if (type === 'bg' || type === 'border') {
                opacities.forEach(opacity => {
                    selectors.push(`.${type}-${color}\\/${opacity}`);
                });
            }
        });
    });

    // Add the other classes (animate-underline, animate-text-color)
    selectors.push('.animate-underline', '.animate-text-color');

    return selectors;
};

// Combined function to generate the safelist for Tailwind config with default parameters
function generateSafelist(colorClasses = defaultColorClasses, opacities = defaultOpacities, elementTypes = defaultElementTypes) {
    // Call generateSelectors inside the generateSafelist function
    let selectors = [];
    
    // Loop through each color
    colorClasses.forEach(color => {
        // Loop through each element type (bg, text, border, decoration)
        elementTypes.forEach(type => {
            // Add the basic color class (e.g. .bg-colorPrimary, .text-colorPrimary)
            selectors.push(`${type}-${color}`);

            // Add the opacity variations for bg and border classes (e.g. .bg-colorPrimary/20)
            if (type === 'bg' || type === 'border') {
                opacities.forEach(opacity => {
                    selectors.push(`${type}-${color}/${opacity}`);
                });
            }
        });
    });

    // Add the other classes (animate-underline, animate-text-color)
    selectors.push('animate-underline', 'animate-text-color');

    return selectors;  // Return the selectors directly for safelist
}

// console.log(generateSelectors());  // This will use the default values

export { generateSelectors, generateSafelist, defaultOpacities, defaultColorClasses, defaultElementTypes };