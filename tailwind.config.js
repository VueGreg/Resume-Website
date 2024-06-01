/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // transitionProperty: {
      //   'height': 'height',
      //   'left' : 'left'
      // },
      colors:{
        'custom-gray':'rgb(55 65 81)',
      },
      dropShadow: {
        '3xl': '0 35px 35px rgba(0, 0, 0, 0.6)',
        '4xl': '0 2px 4px -2px rgba(0,0,0,0.6)',
      },
      boxShadow: {
        'inset': 'inset 0px 0px 20px 8px rgba(64,64,64,0.1)'
      }
    },
  },
  plugins: [require('tailwind-scrollbar')],
  darkMode: 'class',
}