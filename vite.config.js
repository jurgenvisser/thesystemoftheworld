import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // zorgt dat het op alle netwerkinterfaces luistert
        port: 5173,      // of een andere vrije poort
        strictPort: true, // forceert de poort
    },
});
