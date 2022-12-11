import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const host = '188.166.230.123';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        // host: '0.0.0.0',
        host,
        // host: '188.166.230.123',
        hmr: {
            // host: 'localhost',
            host,
        }
    }
});
