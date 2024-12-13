import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Votre fichier CSS principal
                'resources/js/app.js',  // Votre fichier JS principal
                'node_modules/admin-lte/dist/css/adminlte.min.css', // AdminLTE CSS
                'node_modules/admin-lte/dist/js/adminlte.min.js',   // AdminLTE JS
            ],
            refresh: true,
        }),
    ],
});
