import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/boho.css',
                'resources/css/emerald.css',
                'resources/css/ocean.css',
                'resources/css/watercolor.css',
                'resources/css/rustic.css',
                'resources/css/floral-pastel.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
