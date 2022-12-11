import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

// const host = 'markjumeras.com';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        // host,
        hmr: {
            host: 'localhost',
            // host,
        },
        // https: {
        //     key: fs.readFileSync('/etc/nginx/ssl/jumeras.com/1461323/server.crt'),
        //     cert: fs.readFileSync('/etc/nginx/ssl/jumeras.com/1461323/server.crt'),
        // }

    }
});
