import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                times: ['"Times New Roman"', 'serif'], // Add Times New Roman as a custom font
            },
            colors: {
                systemYellow: '#D9AF5C',
            },
        },
    },
    plugins: [],
};


// # Create .env file by copying .env.example
// cp .env.example .env

// # Install all composer dependencies
// composer install

// # Generate the application key
// php artisan key:generate

// # Run database migrations
// php artisan migrate

// # Run database seeders (optional, if you need seed data)
// php artisan db:seed

// # Set the correct file permissions for storage and cache directories
// chmod -R 775 storage
// chmod -R 775 bootstrap/cache