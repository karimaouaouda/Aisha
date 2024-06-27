import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/config/config.js',
                'resources/js/doctor/index.js',
                'resources/js/doctor/patient-states.js',
                'resources/js/doctor/profile.js',
                'resources/js/doctor/requests.js',
                'resources/js/doctor/visualisation/iot.js',
                'resources/js/patient/chat.js',
                'resources/js/alpine.js',
                'resources/js/templates.js',
                'resources/js/wave-converter.js',
            ],
            refresh: true,
        }),
    ],
    define : {
        global : {}
    }
});
