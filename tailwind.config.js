/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      fontFamily: {
        main: ['Inter, sans-serif'],
      },
      colors: {
        primary: {
          500: '#48bd9c',
        }
      },
    },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
