import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js', 'resources/css/nav-modal.scss', 'resources/js/nav-modal.js', 'resources/js/buscar.js'],
            refresh: true,
        }),
    ],
});
