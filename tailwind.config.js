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
      }
    },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
