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
        // host: '0.0.0.0',
        host: true,
        // host: '188.166.230.123',
        // hmr: {
        //     // host: 'localhost',
        //     host: '188.166.230.123',
        // }
    }
});
