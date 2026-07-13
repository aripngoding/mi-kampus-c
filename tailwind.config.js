/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                // Luxury Emerald — hijau emerald elegan & mewah
                green: {
                    50:  '#f1f9f5',
                    100: '#dcefe5',
                    200: '#bbdfcd',
                    300: '#8bc7ab',
                    400: '#54a682',
                    500: '#318a66',
                    600: '#1f6e50',  // primary — deep emerald
                    700: '#195841',
                    800: '#164636',
                    900: '#123a2d',
                    950: '#08201a',
                },
                // Emerald (alias eksplisit, nilai sama)
                emerald: {
                    50:  '#f1f9f5',
                    100: '#dcefe5',
                    200: '#bbdfcd',
                    300: '#8bc7ab',
                    400: '#54a682',
                    500: '#318a66',
                    600: '#1f6e50',
                    700: '#195841',
                    800: '#164636',
                    900: '#123a2d',
                    950: '#08201a',
                },
                // Soft Gray — abu-abu lembut kehangatan netral
                gray: {
                    50:  '#f8faf9',
                    100: '#f1f4f3',
                    200: '#e4e9e7',
                    300: '#cdd5d2',
                    400: '#9aa6a1',
                    500: '#6e7a75',
                    600: '#54605b',
                    700: '#414b47',
                    800: '#2c3431',
                    900: '#1c2421',
                    950: '#0f1413',
                },
                // Gold — aksen emas mewah (pengganti kuning mencolok)
                gold: {
                    50:  '#fdfaf1',
                    100: '#f8f1dc',
                    200: '#efe0b4',
                    300: '#e4cb86',
                    400: '#d6b25c',
                    500: '#c79b3e',
                    600: '#ad7f31',
                    700: '#8a612a',
                    800: '#724e29',
                    900: '#604226',
                },
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
            },
            boxShadow: {
                'luxury': '0 10px 40px -12px rgba(18, 58, 45, 0.25)',
                'luxury-lg': '0 20px 60px -15px rgba(18, 58, 45, 0.3)',
            },
        },
    },
    plugins: [],
};
