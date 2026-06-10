import {defineConfig} from 'vite';
import tailwindcss from '@tailwindcss/vite'
import liveReload from 'vite-plugin-live-reload';

export default defineConfig({
    plugins: [
        tailwindcss(),
        // گوش به زنگ بودن برای تغییرات تمام فایل‌های PHP قالب
        liveReload(__dirname + '/**/*.php'),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        cors: true,
        strictPort: true,
        hmr: {
            host: 'localhost',
            port: 5173,
        },
        watch: {
            usePolling: true,
            interval: 150,
        }
    },
    build: {
        manifest: true,
        outDir: 'dist',
        rollupOptions: {
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                //---GSAP---
                'resources/js/gsap.min.js',
                'resources/js/ScrollTrigger.min.js',
                'resources/js/custom-gsap.js'
            ],
        },
    },
});