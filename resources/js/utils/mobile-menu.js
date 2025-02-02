const hamburgerIcon = document.getElementById("hamburger-icon");
const mobileMenu = document.getElementById("mobile-menu");

// Function to show or hide the menu with animation
function toggleMenu() {
    if (mobileMenu.classList.contains("hidden")) {
        mobileMenu.classList.remove("hidden");
        mobileMenu.classList.add("animate-slide-down");
        mobileMenu.classList.remove("animate-slide-up");
    } else {
        mobileMenu.classList.add("animate-slide-up");
        mobileMenu.classList.remove("animate-slide-down");
        mobileMenu.addEventListener(
            "animationend",
            () => {
                mobileMenu.classList.add("hidden");
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
    if (!mobileMenu.contains(e.target) && !hamburgerIcon.contains(e.target)) {
        if (!mobileMenu.classList.contains("hidden")) {
            toggleMenu();
        }
    }
});