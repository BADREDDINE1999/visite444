import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/assets/js',
                'public/assets/css',
                //'https://use.fontawesome.com/releases/v6.1.0/js/all.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    }

});
