document.addEventListener("DOMContentLoaded", () => {
    const marquees = document.querySelectorAll(".scrolling-banner");

    if (!marquees.length) {
        // console.warn("No elements with the class '.scrolling-banner' were found.");
        return;
    }

    marquees.forEach((marquee) => {
        const container = marquee.parentElement;

        if (!container) {
            console.error("Parent element not found for marquee:", marquee);
            return;
        }

        const duplicateContent = () => {
            const containerWidth = container.offsetWidth;
            let marqueeWidth = marquee.scrollWidth;

            // Duplicate content until the total width is at least twice the container width
            while (marqueeWidth < containerWidth * 2) {
                const children = Array.from(marquee.children);
                children.forEach((item) => {
                    const clone = item.cloneNode(true);
                    marquee.appendChild(clone);
                });
                marqueeWidth = marquee.scrollWidth;
            }
        };

        duplicateContent();

        // Calculate animation duration dynamically
        const totalWidth = marquee.scrollWidth;
        const speed = 100; // Adjust this value for desired scrolling speed
        const duration = totalWidth / speed;

        // Apply animation inline for this specific marquee
        marquee.style.animation = `marquee ${duration}s linear infinite`;
    });
});