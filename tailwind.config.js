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
        poppins: ['Poppins', 'sans-serif'],
        ibmFlexsans: ['IBM Plex Sans', 'sans-serif'],
        raleway: ['raleway', 'sans-serif'],
        inter: ['inter', 'sans-serif'] 
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
          '@screen md': {
            width: '720px',
          },
          '@screen lg': {
            width: '1080px',
          },
          '@screen xl': {
            width: '1280px',
          },
        },
      })
    },
  ],
};
