import './bootstrap';

document.getElementById('current-year').textContent = new Date().getFullYear();

document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButtons = document.querySelectorAll('.theme-toggle');

    if (!themeToggleButtons.length) {
        console.error('Theme toggle button not found!');
        return;
    }

    // Define the initial state
    let isYellow = true;

    // Set the default colors (yellow theme by default)
    const systemYellow = '#D9AF5C'; // Yellow color
    const systemBlue = '#62dfe6'; // Blue color

    themeToggleButtons.forEach((themeToggleButton) => {
        themeToggleButton.addEventListener('click', () => {
            // Select elements to toggle theme on
            const elementsToToggle = [
                document.body, // The body
                ...document.querySelectorAll('.bg-systemYellow, .bg-systemYellow\\/20, .bg-systemYellow\\/60, .text-systemYellow, .border-systemYellow, .bg-systemBlue, .bg-systemBlue\\/20, .bg-systemBlue\\/60, .text-systemBlue, .border-systemBlue'),
            ];

            elementsToToggle.forEach((el) => {
                if (isYellow) {
                    // Switching from yellow to blue theme
                    if (el.classList.contains('bg-systemYellow')) {
                        el.classList.remove('bg-systemYellow');
                        el.classList.add('bg-systemBlue');
                    }
                    if (el.classList.contains('bg-systemYellow/20')) {
                        el.classList.remove('bg-systemYellow/20');
                        el.classList.add('bg-systemBlue/20');
                    }
                    if (el.classList.contains('bg-systemYellow/60')) {
                        el.classList.remove('bg-systemYellow/60');
                        el.classList.add('bg-systemBlue/60');
                    }
                    if (el.classList.contains('text-systemYellow')) {
                        el.classList.remove('text-systemYellow');
                        el.classList.add('text-systemBlue');
                    }
                    if (el.classList.contains('border-systemYellow')) {
                        el.classList.remove('border-systemYellow');
                        el.classList.add('border-systemBlue');
                    }
                    if (el.classList.contains('border-systemYellow/85')) {
                        el.classList.remove('border-systemYellow/85');
                        el.classList.add('border-systemBlue/85');
                    }
                    if (el.classList.contains('border-systemYellow/70')) {
                        el.classList.remove('border-systemYellow/70');
                        el.classList.add('border-systemBlue/70');
                    }
                    if (el.classList.contains('border-systemYellow/55')) {
                        el.classList.remove('border-systemYellow/55');
                        el.classList.add('border-systemBlue/55');
                    }
                    if (el.classList.contains('border-systemYellow/40')) {
                        el.classList.remove('border-systemYellow/40');
                        el.classList.add('border-systemBlue/40');
                    }
                    if (el.classList.contains('border-systemYellow/25')) {
                        el.classList.remove('border-systemYellow/25');
                        el.classList.add('border-systemBlue/25');
                    }
                } else {
                    // Switching from blue to yellow theme
                    if (el.classList.contains('bg-systemBlue')) {
                        el.classList.remove('bg-systemBlue');
                        el.classList.add('bg-systemYellow');
                    }
                    if (el.classList.contains('bg-systemBlue/20')) {
                        el.classList.remove('bg-systemBlue/20');
                        el.classList.add('bg-systemYellow/20');
                    }
                    if (el.classList.contains('bg-systemBlue/60')) {
                        el.classList.remove('bg-systemBlue/60');
                        el.classList.add('bg-systemYellow/60');
                    }
                    if (el.classList.contains('text-systemBlue')) {
                        el.classList.remove('text-systemBlue');
                        el.classList.add('text-systemYellow');
                    }
                    if (el.classList.contains('border-systemBlue')) {
                        el.classList.remove('border-systemBlue');
                        el.classList.add('border-systemYellow');
                    }
                    if (el.classList.contains('border-systemBlue/85')) {
                        el.classList.remove('border-systemBlue/85');
                        el.classList.add('border-systemYellow/85');
                    }
                    if (el.classList.contains('border-systemBlue/70')) {
                        el.classList.remove('border-systemBlue/70');
                        el.classList.add('border-systemYellow/70');
                    }
                    if (el.classList.contains('border-systemBlue/55')) {
                        el.classList.remove('border-systemBlue/55');
                        el.classList.add('border-systemYellow/55');
                    }
                    if (el.classList.contains('border-systemBlue/40')) {
                        el.classList.remove('border-systemBlue/40');
                        el.classList.add('border-systemYellow/40');
                    }
                    if (el.classList.contains('border-systemBlue/25')) {
                        el.classList.remove('border-systemBlue/25');
                        el.classList.add('border-systemYellow/25');
                    }
                }
            });

            // Toggle the button styles independently
            if (isYellow) {
                themeToggleButton.classList.remove('bg-systemYellow', 'text-systemYellow', 'border-systemYellow');
                themeToggleButton.classList.add('bg-systemBlue', 'text-systemBlue', 'border-systemBlue');
            } else {
                themeToggleButton.classList.remove('bg-systemBlue', 'text-systemBlue', 'border-systemBlue');
                themeToggleButton.classList.add('bg-systemYellow', 'text-systemYellow', 'border-systemYellow');
            }

            // Toggle the state
            isYellow = !isYellow;

            // Debugging log
            console.log('Theme changed:', isYellow ? 'Blue' : 'Yellow');
            console.log('Body classes:', document.body.classList);
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButtons = document.querySelectorAll('.theme-toggle');

    if (!themeToggleButtons.length) {
        console.error('Theme toggle button not found!');
        return;
    }

    let isYellow = true;

    themeToggleButtons.forEach((themeToggleButton) => {
        themeToggleButton.addEventListener('click', () => {
            const elementsToToggle = [
                document.body,
                ...document.querySelectorAll('.animate-underline, .animate-text-color'),
            ];

            elementsToToggle.forEach((el) => {
                if (isYellow) {
                    // Switching to the blue theme
                    if (el.classList.contains('theme-yellow')) {
                        el.classList.remove('theme-yellow');
                        el.classList.add('theme-blue');
                    }

                    // Change text and underline color without affecting background
                    document.documentElement.style.setProperty('--primary-text-color', '#62dfe6'); // Blue color
                    document.documentElement.style.setProperty('--primary-hover-link-color', '#3b82f6'); // Blue hover color
                } else {
                    // Switching to the yellow theme
                    if (el.classList.contains('theme-blue')) {
                        el.classList.remove('theme-blue');
                        el.classList.add('theme-yellow');
                    }

                    // Change text and underline color without affecting background
                    document.documentElement.style.setProperty('--primary-text-color', '#D9AF5C'); // Yellow color
                    document.documentElement.style.setProperty('--primary-hover-link-color', '#fbd100'); // Yellow hover color
                }
            });

            // Toggle button styles independently
            if (isYellow) {
                themeToggleButton.classList.remove('bg-systemYellow', 'text-systemYellow', 'border-systemYellow');
                themeToggleButton.classList.add('bg-systemBlue', 'text-systemBlue', 'border-systemBlue');
            } else {
                themeToggleButton.classList.remove('bg-systemBlue', 'text-systemBlue', 'border-systemBlue');
                themeToggleButton.classList.add('bg-systemYellow', 'text-systemYellow', 'border-systemYellow');
            }

            isYellow = !isYellow;
        });
    });
});