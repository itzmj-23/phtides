import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import inject from '@rollup/plugin-inject';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        inject({
            //Remember to add `"jquery": "^3.6.1"` in `dependencies` for `package.json`
            jQuery: "jquery",
            // "window.jQuery": "jquery",
            $: "jquery"
        })
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
