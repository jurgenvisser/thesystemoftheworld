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
    safelist: [
        'bg-h-backdrop-4', // Add the class you want to safelist here
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                times: ['"Times New Roman"', 'serif'], // Add Times New Roman as a custom font
            },
            colors: {
                systemYellow: '#D9AF5C', // Add systemYellow as a custom color
            },
            backgroundImage: {
                'h-backdrop-1': "url('/public/images/backdrop/horizontal/h_backdrop_1.jpg')",
                'h-backdrop-2': "url('/public/images/backdrop/horizontal/h_backdrop_2.jpg')",
                'h-backdrop-3': "url('/public/images/backdrop/horizontal/h_backdrop_3.jpg')",
                'h-backdrop-4': "url('/public/images/backdrop/horizontal/h_backdrop_4.jpg')",

                'v-backdrop-1': "url('/public/images/backdrop/vertical/v_backdrop_1.jpg')",
                'v-backdrop-2': "url('/public/images/backdrop/vertical/v_backdrop_2.jpg')",
                'v-backdrop-3': "url('/public/images/backdrop/vertical/v_backdrop_3.jpg')",
                'v-backdrop-4': "url('/public/images/backdrop/vertical/v_backdrop_4.jpg')",
                'v-backdrop-5': "url('/public/images/backdrop/vertical/v_backdrop_5.jpg')",
                'v-backdrop-6': "url('/public/images/backdrop/vertical/v_backdrop_6.PNG')",
                'v-backdrop-7': "url('/public/images/backdrop/vertical/v_backdrop_7.jpg')",
                'v-backdrop-8': "url('/public/images/backdrop/vertical/v_backdrop_8.jpg')",
                'v-backdrop-9': "url('/public/images/backdrop/vertical/v_backdrop_9.jpg')",

                'the-system-full': "url('/public/images/backdrop/the_system_full.jpg')",
            },
        },
    },
    plugins: [],
};

// !! This is for serious warnings or depricated methods
// ! This is for alerts
// & This is for notes
// todo This is for ToDo's
// * This is for suggestions
// ? This is for questions
// . This is for informative comments
// # This is for important information
// This is a normal comment
// // This is a commented out comment and will be deleted in furute versions


// # Create .env file by copying .env.example
// cp .env.example .env

// # Install all composer dependencies
// composer install

// # Install all NPM dependencies
// npm install

// # Generate the application key
// php artisan key:generate

// # Run database migrations
// php artisan migrate

// # Run database seeders (optional, if you need seed data)
// php artisan db:seed

// # Set the correct file permissions for storage and cache directories
// chmod -R 775 storage
// chmod -R 775 bootstrap/cache