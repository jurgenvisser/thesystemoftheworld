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

        'h-8', 'w-8', 'mb-6',

        'bg-h-backdrop-1',
        'bg-h-backdrop-2',
        'bg-h-backdrop-3',
        'bg-h-backdrop-4',

        'bg-v-backdrop-1',
        'bg-v-backdrop-2',
        'bg-v-backdrop-3',
        'bg-v-backdrop-4',
        'bg-v-backdrop-5',
        'bg-v-backdrop-6',
        'bg-v-backdrop-7',
        'bg-v-backdrop-8',
        'bg-v-backdrop-9',

        'bg-the-system-quinn',
        'bg-the-system-full',
        'bg-blueprint-full',
        'bg-the-system-horse',
        'bg-blueprint-horse',

        'bg-tiktok-white',
        'bg-tiktok-black',
        'bg-tiktok-color-white',
        'bg-tiktok-color-black',
        'bg-youtube-color',
        'bg-youtube-black',
        'bg-youtube-white',
        'bg-telegram-color',
        'bg-telegram-black',
        'bg-telegram-white',
        'bg-discord-blurple',
        'bg-discord-black',
        'bg-discord-white',
        'bg-discord-light-blurple',

        'bg-instagram-color',
        'bg-instagram-black',
        'bg-instagram-white',
        'bg-facebook-color',
        'bg-facebook-white',
        'bg-whatsapp-green',
        'bg-whatsapp-black',
        'bg-whatsapp-white',
        'bg-whatsapp-dark-green',

        'bg-x-black',
        'bg-x-white',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto Slab', 'serif'],
                times: ['"Times New Roman"', 'serif'], // Add Times New Roman as a custom font
                mono: ['"Fira Code"', 'Menlo', 'Monaco', 'Courier New', 'monospace'],
            },
            colors: {
                colorPrimary: '#D9AF5C', // Add colorPrimary as a custom color
                colorSecondary: '#62DFE6', // Add colorSecondary as a custom color
                colorDocument: '#946900', // Add colorDocument as a custom color
                blurple: '#5865F2', // Add Discord Blurple color
                lightBlurple: '#E0E3FF', // Add Discord Light Blurple color
                colorLight: '#e5e7eb', // Add colorLight as near white color for text
            },
            screens: {
                // 'sm': '640px', // Small screens
                // 'md': '768px', // Medium screens
                // 'lg': '1024px', // Large screens
                // 'xl': '1280px', // Extra large screens
                // '2xl': '1536px', // Small Monitor screens
                '3xl': '1680px', // Medium Monitor screens
                '4xl': '1920px', // Large Monitor screens
                '5xl': '2560px', // Extra Large Monitor screens
            },
            spacing: {
                18: '4.5rem', // This is 72px (18 * 4px, assuming the default base unit)
            },
            backgroundImage: {
                'h-backdrop-1': "url('/images/backdrop/horizontal/h_backdrop_1.jpg')",
                'h-backdrop-2': "url('/images/backdrop/horizontal/h_backdrop_2.jpg')",
                'h-backdrop-3': "url('/images/backdrop/horizontal/h_backdrop_3.jpg')",
                'h-backdrop-4': "url('/images/backdrop/horizontal/h_backdrop_4.jpg')",

                'v-backdrop-1': "url('/images/backdrop/vertical/v_backdrop_1.jpg')",
                'v-backdrop-2': "url('/images/backdrop/vertical/v_backdrop_2.jpg')",
                'v-backdrop-3': "url('/images/backdrop/vertical/v_backdrop_3.jpg')",
                'v-backdrop-4': "url('/images/backdrop/vertical/v_backdrop_4.jpg')",
                'v-backdrop-5': "url('/images/backdrop/vertical/v_backdrop_5.jpg')",
                'v-backdrop-6': "url('/images/backdrop/vertical/v_backdrop_6.PNG')",
                'v-backdrop-7': "url('/images/backdrop/vertical/v_backdrop_7.jpg')",
                'v-backdrop-8': "url('/images/backdrop/vertical/v_backdrop_8.jpg')",
                'v-backdrop-9': "url('/images/backdrop/vertical/v_backdrop_9.jpg')",

                'the-system-quinn': "url('/images/TheSystemProfilePicture.jpeg')",
                'the-system-full': "url('/images/logos/TheSystemFull.svg')",
                'blueprint-full': "url('/images/logos/BlueprintFull.svg')",
                'the-system-horse': "url('/images/logos/TheSystemHorse.svg')",
                'blueprint-horse': "url('/images/logos/BlueprintHorse.svg')",
                
                'tiktok-white': "url('/images/icons/TikTok_Glyph_White.svg')",
                'tiktok-black': "url('/images/icons/TikTok_Glyph_Black.svg')",
                'tiktok-color-white': "url('/images/icons/TikTok_Glyph_Color_White.svg')",
                'tiktok-color-black': "url('/images/icons/TikTok_Glyph_Color_Black.svg')",
                'youtube-color': "url('/images/icons/youtube_red.svg')",
                'youtube-black': "url('/images/icons/youtube_black.svg')",
                'youtube-white': "url('/images/icons/youtube_white.svg')",
                'telegram-color': "url('/images/icons/telegram_color.svg')",
                'telegram-black': "url('/images/icons/telegram_black.svg')",
                'telegram-white': "url('/images/icons/telegram_white.svg')",
                'discord-blurple': "url('/images/icons/Discord_Symbol_Blurple.svg')",
                'discord-black': "url('/images/icons/Discord_Symbol_Black.svg')",
                'discord-white': "url('/images/icons/Discord_Symbol_White.svg')",
                'discord-light-blurple': "url('/images/icons/Discord_Symbol_Light_Blurple.svg')",
                
                'instagram-color': "url('/images/icons/Instagram_Glyph_Gradient.svg')",
                'instagram-black': "url('/images/icons/Instagram_Glyph_Black.svg')",
                'instagram-white': "url('/images/icons/Instagram_Glyph_White.svg')",
                'facebook-color': "url('/images/icons/Facebook_Logo_Primary.png')",
                'facebook-white': "url('/images/icons/Facebook_Logo_Secondary.png')",
                'whatsapp-green': "url('/images/icons/WhatsApp_Green.svg')",
                'whatsapp-black': "url('/images/icons/WhatsApp_Black.svg')",
                'whatsapp-white': "url('/images/icons/WhatsApp_White.svg')",
                'whatsapp-dark-green': "url('/images/icons/WhatsApp_Dark_green.svg')",
                'x-black': "url('/images/icons/x_logo_black.svg')",
                'x-white': "url('/images/icons/x_logo_white.svg')",
            },
        },
    },
    plugins: [
        plugin(function ({ addUtilities, addBase, theme }) {
            // ---- bestaande utilities van jou ----
            addUtilities(
                {
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
                        backgroundImage: "url('/images/emojis/clover.png')",
                        backgroundSize: 'contain',
                        backgroundRepeat: 'no-repeat',
                        verticalAlign: 'middle',
                    },
                    '.clover-chess::after': {
                        content: '""',
                        display: 'inline-block',
                        width: '1em',
                        height: '1em',
                        backgroundImage: "url('/images/emojis/chess.png')",
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
                    '.animate-text-color': {
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
                        textDecoration: 'none',
                        position: 'relative',
                        overflow: 'hidden',
                        transition: 'color 0.3s ease',
                    },
                    '.scrolling-banner': {
                        willChange: 'transform',
                        backfaceVisibility: 'hidden',
                        transformStyle: 'preserve-3d',
                    },
                    '.module-card': {
                        boxShadow: '0 0 30px rgba(98, 223, 230, 0.1)',
                        transition: 'all 0.4s ease-in-out',
                    },
                    '.module-card:hover': {
                        borderColor: '#62DFE6',
                        transform: 'translateY(-5px)',
                        boxShadow: '0 10px 40px rgba(98, 223, 230, 0.3)',
                    },
                    '.pakket-card': {
                        boxShadow: '0 0 30px rgba(217, 175, 92, 0.1)',
                        transition: 'all 0.4s ease-in-out',
                    },
                    '.pakket-card:hover': {
                        borderColor: '#D9AF5C',
                        boxShadow: '0 10px 40px rgba(217, 175, 92, 0.4)',
                    },
                },
                ['responsive', 'hover']
            );

            // ---- NIEUWE PLUGIN: auto-generatie van bg-classes ----
            const bgImages = theme('backgroundImage') || {};
            const bgUtilities = {};

            for (const key in bgImages) {
                bgUtilities[`.bg-${key}`] = {
                    backgroundImage: bgImages[key],
                };
            }

            addUtilities(bgUtilities);
        }),
    ]
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