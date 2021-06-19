const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                'body': ['Oswald'],
            },
            colors: {
                primary: {
                    DEFAULT: '#003459',
                }
            }
        },
    },

    variants: {
            opacity: ['disabled'],
            transform: ['hover'],
            backgroundColor: ['checked'],
            borderColor: ['checked'],
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
