import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(['resources/ts/app.tsx']), // Menggunakan app.tsx sebagai titik masuk aplikasi
    ],
    resolve: {
        alias: {
            '@': '/resources/ts', // Mengatur alias '@' untuk merujuk ke direktori resources/ts
        },
    },
});
