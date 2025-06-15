

// scroll-to-top.js

// Show or hide the scroll-to-top button based on scroll position
function toggleScrollToTopButton() {
  const scrollToTopBtn = document.getElementById('scrollToTopBtn');
  if (!scrollToTopBtn) return;

  // Show button if scrolled more than 50vh
  if (window.scrollY > window.innerHeight / 2) {
    scrollToTopBtn.style.display = 'block';
  } else {
    scrollToTopBtn.style.display = 'none';
  }
}

// Scroll smoothly to the top when button is clicked
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Setup event listeners
function initScrollToTop() {
  window.addEventListener('scroll', toggleScrollToTopButton);

  const scrollToTopBtn = document.getElementById('scrollToTopBtn');
  if (scrollToTopBtn) {
    scrollToTopBtn.addEventListener('click', scrollToTop);
  }
}

// Initialize on DOM content loaded
document.addEventListener('DOMContentLoaded', initScrollToTop);

export { initScrollToTop };