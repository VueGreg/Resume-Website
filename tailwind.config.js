/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      transitionProperty: {
        'height': 'height'
      },
      colors:{
        'custom-gray':'rgb(55 65 81)',
      }
    },
  },
  plugins: [require('tailwind-scrollbar')],
  darkMode: 'class',
}