import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            colors: {
                obsidian: '#070b13',
                midnight: '#0c1322',
                surface: '#11192d',
                brand: {
                    50: '#ecfeff',
                    100: '#cffafe',
                    200: '#a5f3fc',
                    300: '#67e8f9',
                    400: '#22d3ee',
                    500: '#06b6d4',
                    600: '#0891b2',
                    700: '#0e7490',
                    800: '#155e75',
                    900: '#164e63',
                    950: '#083344',
                },
                accent: {
                    50: '#eef2ff',
                    100: '#e0e7ff',
                    200: '#c7d2fe',
                    300: '#a5b4fc',
                    400: '#818cf8',
                    500: '#6366f1',
                    600: '#4f46e5',
                    700: '#4338ca',
                    800: '#3730a3',
                    900: '#312e81',
                },
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', 'Outfit', ...defaultTheme.fontFamily.sans],
                display: ['Outfit', '"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
            },
            boxShadow: {
                'glow-cyan': '0 0 50px -10px rgba(6, 182, 212, 0.35)',
                'glow-indigo': '0 0 50px -10px rgba(99, 102, 241, 0.35)',
                'glow-emerald': '0 0 45px -10px rgba(16, 185, 129, 0.35)',
                'glow-amber': '0 0 45px -10px rgba(245, 158, 11, 0.35)',
                'card-hover': '0 20px 40px -15px rgba(2, 6, 23, 0.08), 0 0 0 1px rgba(99, 102, 241, 0.15)',
                'card-hover-dark': '0 25px 50px -12px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(34, 211, 238, 0.25)',
                'glass': '0 8px 32px 0 rgba(0, 0, 0, 0.37)',
            },
            animation: {
                'pulse-slow': 'pulse 5s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'fade-in-up': 'fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'float': 'float 6s ease-in-out infinite',
                'float-delayed': 'float 7s ease-in-out 2s infinite',
                'marquee': 'marquee 30s linear infinite',
                'shimmer': 'shimmer 2.5s infinite linear',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-12px)' },
                },
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '-200% 0' },
                    '100%': { backgroundPosition: '200% 0' },
                },
            },
            backgroundImage: {
                'radial-glow': 'radial-gradient(circle at 50% 0%, var(--tw-gradient-stops))',
                'mesh': 'radial-gradient(at 100% 0%, rgba(99, 102, 241, 0.15) 0px, transparent 50%), radial-gradient(at 0% 100%, rgba(6, 182, 212, 0.15) 0px, transparent 50%)',
            },
        },
    },

    plugins: [forms],
};
