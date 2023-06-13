import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'node_modules/flatpickr/dist/flatpickr.js',
                'node_modules/flatpickr/dist/flatpickr.css',
                'node_modules/simple-datatables/dist/style.css',
                'node_modules/simple-datatables/dist/index.js',
            ],
            refresh: true,
        }),
    ],
});
