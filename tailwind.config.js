/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php", // scans all PHP files
    "./src/**/*.{js,css}", // if you have JS or CSS in a src folder
  ],
  theme: {
    extend: {
      fontFamily: {
        corben: ['corben', 'sans-serif'], // use as font-shrikhand
        fraunces: ['fraunces', 'sans-serif'],
        poppins: ['poppins', 'sans-serif'],
      },
    },
  },
  plugins: [
    ({ addComponents }) => {
      addComponents({
        '.custom-container': {
            marginLeft: 'auto',
            marginRight: 'auto',
            width: '90%',
            '@screen xl': {
              width: '1280px',
            },
            '@screen lg': {
              width: '1080px',
            },
            '@screen md': {
              width: '720px',
            }
        },
      })
    },
  ],
};
