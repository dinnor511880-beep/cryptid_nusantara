import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                horror: ['"Creepster"', 'cursive'],
                mono: ['"Fira Code"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                blood: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fca5a5',
                    300: '#f87171',
                    400: '#ef4444',
                    500: '#dc2626',
                    600: '#b91c1c',
                    700: '#991b1b',
                    800: '#7f1d1d',
                    900: '#450a0a',
                },
                abyss: {
                    50: '#1a1a2e',
                    100: '#16162a',
                    200: '#121226',
                    300: '#0e0e22',
                    400: '#0a0a1e',
                    500: '#08081a',
                    600: '#060616',
                    700: '#040412',
                    800: '#02020e',
                    900: '#01010a',
                },
                phantom: {
                    50: '#e8d5f5',
                    100: '#d4b3ec',
                    200: '#b87ce0',
                    300: '#9b45d4',
                    400: '#7e2eb8',
                    500: '#6b21a8',
                    600: '#581c87',
                    700: '#3b0764',
                    800: '#2e0550',
                    900: '#1a0330',
                },
            },
            animation: {
                'flicker': 'flicker 3s infinite alternate',
                'float': 'float 6s ease-in-out infinite',
                'pulse-glow': 'pulse-glow 2s ease-in-out infinite',
                'slide-up': 'slide-up 0.5s ease-out',
                'fog': 'fog 8s ease-in-out infinite',
            },
            keyframes: {
                flicker: {
                    '0%, 19%, 21%, 23%, 25%, 54%, 56%, 100%': { opacity: '1' },
                    '20%, 24%, 55%': { opacity: '0.4' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                'pulse-glow': {
                    '0%, 100%': { boxShadow: '0 0 5px rgba(220, 38, 38, 0.3)' },
                    '50%': { boxShadow: '0 0 20px rgba(220, 38, 38, 0.6), 0 0 40px rgba(220, 38, 38, 0.3)' },
                },
                'slide-up': {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                fog: {
                    '0%, 100%': { opacity: '0.3' },
                    '50%': { opacity: '0.6' },
                },
            },
            boxShadow: {
                'horror': '0 0 15px rgba(220, 38, 38, 0.15), 0 0 30px rgba(0, 0, 0, 0.3)',
                'horror-lg': '0 0 30px rgba(220, 38, 38, 0.2), 0 0 60px rgba(0, 0, 0, 0.4)',
                'phantom': '0 0 15px rgba(107, 33, 168, 0.2), 0 0 30px rgba(0, 0, 0, 0.3)',
            },
        },
    },

    plugins: [forms],
};
