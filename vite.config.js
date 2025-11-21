import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { internalIpV4 } from 'internal-ip';

export default defineConfig(async () => {
    // detecteer automatisch LAN IP
    const ip = await internalIpV4() || 'localhost';

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            
        ],
        resolve: {
            alias: process.env.NODE_ENV === 'development'
                ? { '/images': '/public/images' }
                : {}
        },
        server: {
            host: '0.0.0.0',   // luister op alle netwerkinterfaces
            port: 5173,
            strictPort: true,
            hmr: {
                host: ip,      // automatisch gedetecteerd LAN IP
                protocol: 'ws',
                port: 5173,
            },
        },
        base: '/',          // relatieve paden voor assets
    };
});