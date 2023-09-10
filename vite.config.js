import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: {
                app: './resources/js/app.js',
                styles: './resources/css/app.css',
            },
        }),
    ],
    build: {
        outDir: 'public/build',
        manifest: true,
        rollupOptions: {
            input: {
                app: './resources/js/app.js',
                styles: './resources/css/app.css',
            },
        },
    },
});
