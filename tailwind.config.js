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
  plugins: [],
};
