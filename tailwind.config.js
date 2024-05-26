import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import preset from './vendor/filament/support/tailwind.config.preset'
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    presets : [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/filament/client/resources/chat-resource/pages/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './resources/views/auth/custom/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors : {
                ...colors
            }
        },
    },

    plugins: [forms, typography],
};
