/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'display': ['Poppins'],
        'body': ['Poppins'],
      },
      transitionProperty: {
        'height': 'height'
      }
    },
  },
  plugins: [require('tailwind-scrollbar')],
}