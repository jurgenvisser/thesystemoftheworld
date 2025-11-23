// utils/selectors.js

// Default values for opacities, color classes, and element types
const defaultOpacities = ['0', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55', '60', '65', '70', '75', '80', '85', '90', '95', '100'];
const defaultColorClasses = ['colorPrimary', 'colorSecondary'];
const defaultElementTypes = ['bg', 'border', 'text', 'decoration', 'ring', 'shadow', 'outline'];

// Function to dynamically generate class selectors based on color, opacity, and element types
const generateSelectors = (colorClasses = defaultColorClasses, opacities = defaultOpacities, elementTypes = defaultElementTypes) => {
    let selectors = [];
    
    // Loop through each color
    colorClasses.forEach(color => {
        // Loop through each element type (bg, text, border, decoration)
        elementTypes.forEach(type => {
            // Add the basic color class (e.g. .bg-colorPrimary, .text-colorPrimary)
            selectors.push(`.${type}-${color}`);

            // Add the hover variants for basic color class
            selectors.push(`.hover\\:${type}-${color}`);

            // Add the opacity variations for bg and border classes (e.g. .bg-colorPrimary/20)
            if (type === 'bg' || type === 'border' || type === 'ring' || type === 'shadow' || type === 'outline') {
                opacities.forEach(opacity => {
                    selectors.push(`.${type}-${color}\\/${opacity}`);
                    selectors.push(`.hover\\:${type}-${color}\\/${opacity}`);
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
    let selectors = [];
    
    // Loop through each color
    colorClasses.forEach(color => {
        // Loop through each element type (bg, text, border, decoration)
        elementTypes.forEach(type => {
            // Add the basic color class (e.g. .bg-colorPrimary, .text-colorPrimary)
            selectors.push(`${type}-${color}`);
            selectors.push(`hover:${type}-${color}`);

            // Add the opacity variations for bg and border classes (e.g. .bg-colorPrimary/20)
            if (type === 'bg' || type === 'border' || type === 'ring' || type === 'shadow' || type === 'outline') {
                opacities.forEach(opacity => {
                    selectors.push(`${type}-${color}/${opacity}`);
                    selectors.push(`hover:${type}-${color}/${opacity}`);
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