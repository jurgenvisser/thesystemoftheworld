const hamburgerIcon = document.getElementById("hamburger-icon");
const testingMenu = document.getElementById("testing-menu");

// Function to show or hide the menu with animation
function toggleMenu() {
    if (testingMenu.classList.contains("hidden")) {
        testingMenu.classList.remove("hidden");
        testingMenu.classList.add("animate-slide-down");
        testingMenu.classList.remove("animate-slide-up");
    } else {
        testingMenu.classList.add("animate-slide-up");
        testingMenu.classList.remove("animate-slide-down");
        testingMenu.addEventListener(
            "animationend",
            () => {
                testingMenu.classList.add("hidden");
            },
            { once: true }
        );
    }
}

// Event listener for hamburger icon
hamburgerIcon.addEventListener("click", (e) => {
    e.stopPropagation(); // Prevent click from propagating to the document
    toggleMenu();
});

// Event listener to close the menu when clicking outside
document.addEventListener("click", (e) => {
    if (!testingMenu.contains(e.target) && !hamburgerIcon.contains(e.target)) {
        if (!testingMenu.classList.contains("hidden")) {
            toggleMenu();
        }
    }
});