import vue from '@vitejs/plugin-vue'
import autoprefixer from 'autoprefixer'
import laravel from 'laravel-vite-plugin'
import path from 'path'
import tailwindcss from 'tailwindcss'
import { resolve } from 'node:path'
import { defineConfig } from 'vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@sass': path.resolve(__dirname, './resources/sass'), // Alias для sass
            'ziggy-js': resolve(__dirname, 'vendor/tightenco/ziggy'),
            '@icons': path.resolve(__dirname, './resources/assets/icons'),
            '@assets': path.resolve(__dirname, 'resources/assets'),
            '@blocks': path.resolve(__dirname, 'resources/blocks'),
        },
    },
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
        preprocessorOptions: {
            scss: {
                additionalData: `
                @import "@sass/variables";
                @import "@sass/mixins";
                `, // використовуємо alias
            },
        },
    },
    ssr: {
        noExternal: ['@inertiajs/server', '@inertiajs/vue3'],
    },
})
