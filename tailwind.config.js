import defaultTheme from 'tailwindcss/defaultTheme';
import { generateSafelist } from './resources/js/utils/selectors.js'; // Ensure the path is correct

const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    safelist: [// Add the class you want to safelist here
        ...generateSafelist(),
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                times: ['"Times New Roman"', 'serif'], // Add Times New Roman as a custom font
            },
            colors: {
                colorPrimary: '#D9AF5C', // Add colorPrimary as a custom color
                colorSecondary: '#62dfe6', // Add colorSecondary as a custom color
                colorDocument: '#946900', // Add colorDocument as a custom color
            },
            screens: {
                'xl': '1600px', // Custom breakpoint for 1600px
                '2xl': '1800px', // Make 2xl larger than xl
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

                'the-system-full': "url('/public/images/logos/TheSystemFull.svg')",
                'blueprint-full': "url('/public/images/logos/BlueprintFull.svg')",
                'the-system-horse': "url('/public/images/logos/TheSystemHorse.svg')",
                'blueprint-horse': "url('/public/images/logos/BlueprintHorse.svg')",
                
                'tiktok-white': "url('/public/images/icons/TikTok_Glyph_White.svg')",
                'tiktok-black': "url('/public/images/icons/TikTok_Glyph_Black.svg')",
                'tiktok-color-white': "url('/public/images/icons/TikTok_Glyph_Color_White.svg')",
                'tiktok-color-black': "url('/public/images/icons/TikTok_Glyph_Color_Black.svg')",
                'youtube-color': "url('/public/images/icons/youtube_red.svg')",
                'youtube-black': "url('/public/images/icons/youtube_black.svg')",
                'youtube-white': "url('/public/images/icons/youtube_white.svg')",
                'telegram-color': "url('/public/images/icons/telegram_color.svg')",
                'telegram-black': "url('/public/images/icons/telegram_black.svg')",
                'telegram-white': "url('/public/images/icons/telegram_white.svg')",
                'instagram-color': "url('/public/images/icons/Instagram_Glyph_Gradient.svg')",
                'instagram-black': "url('/public/images/icons/Instagram_Glyph_Black.svg')",
                'instagram-white': "url('/public/images/icons/Instagram_Glyph_White.svg')",
                'facebook-color': "url('/public/images/icons/Facebook_Logo_Primary.png')",
                'facebook-white': "url('/public/images/icons/Facebook_Logo_Secondary.png')",
            },
        },
    },
    plugins: [
        plugin(function ({ addUtilities, theme }) {
            addUtilities(
                {
                    /* Existing utilities */
                    '.clover-chess': {
                        display: 'inline-flex',
                        alignItems: 'center',
                        gap: '0em',
                    },
                    '.clover-chess::before': {
                        content: '""',
                        display: 'inline-block',
                        width: '1em',
                        height: '1em',
                        backgroundImage: "url('/public/images/emojis/clover.png')",
                        backgroundSize: 'contain',
                        backgroundRepeat: 'no-repeat',
                        verticalAlign: 'middle',
                    },
                    '.clover-chess::after': {
                        content: '""',
                        display: 'inline-block',
                        width: '1em',
                        height: '1em',
                        backgroundImage: "url('/public/images/emojis/chess.png')",
                        backgroundSize: 'contain',
                        backgroundRepeat: 'no-repeat',
                        verticalAlign: 'middle',
                    },
                    '.responsive-width': {
                        width: '85vw',
                    },
                    '@screen lg': {
                        '.responsive-width': {
                        width: '80vw',
                        },
                    },
                    '.responsive-height': {
                        paddingTop: '3rem',
                        paddingBottom: '3rem',
                    },
                    [`@media (min-width: ${theme('screens.lg')})`]: {
                        '.responsive-height': {
                            paddingTop: '6rem',
                            paddingBottom: '6rem',
                        },
                    },
                    /* New utilities */
                    '.animate-text-color': {
                        color: 'white',
                        transition: 'color 0.3s ease',
                    },
                    '.theme-primary.animate-text-color:hover': {
                        color: theme('colors.colorPrimary'),
                    },
                    '.theme-secondary.animate-text-color:hover': {
                        color: theme('colors.colorSecondary'),
                    },
                    '.animate-underline::after': {
                        content: '""',
                        position: 'absolute',
                        bottom: '0',
                        left: '50%',
                        width: '0%',
                        height: '2px',
                        backgroundColor: 'transparent',
                        transformOrigin: 'center center',
                        transform: 'translateX(-50%)',
                        transition: 'width 0.3s ease, background-color 0.3s ease',
                    },
                    '.theme-primary.animate-underline::after': {
                        backgroundColor: theme('colors.colorPrimary'),
                    },
                    '.theme-primary.animate-underline:hover::after': {
                        width: '100%',
                    },
                    '.theme-secondary.animate-underline::after': {
                        backgroundColor: theme('colors.colorSecondary'),
                    },
                    '.theme-secondary.animate-underline:hover::after': {
                        width: '100%',
                    },
                    '.theme-primary, .theme-secondary': {
                        color: 'white', /* Keep links white by default */
                        textDecoration: 'none', /* No underline by default */
                        position: 'relative', /* So we can position the underline */
                        overflow: 'hidden', /* Hide the underline by default */
                        transition: 'color 0.3s ease', /* Smooth transition for text color */
                    },
                },
                ['responsive', 'hover']
            );
        }),
    ],
};

// !! This is for serious warnings or depricated methods
// ! This is for alerts
// todo This is for ToDo's
// & This is for notes
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
// npm install crypto-js

// # Generate the application key
// php artisan key:generate

// # Run database migrations
// php artisan migrate

// # Run database seeders (optional, if you need seed data)
// php artisan db:seed

// # Set the correct file permissions for storage and cache directories
// chmod -R 775 storage
// chmod -R 775 bootstrap/cache