/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "./*.php",
    "./templates/**/*.php",
    "./parts/**/*.php",
    "./inc/**/*.php",
    "./assets/js/**/*.js",
  ],

  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        montserrat: ["Montserrat", "sans-serif"],
        poppins: ["Poppins", "sans-serif"],
        robotoCondensed: ["Roboto Condensed", "sans-serif"],
      },
      backgroundImage: {
        "home-bg": "url('../img/home_bg.png')",
        "bg-left-nav": "url('../img/home_bg.png')",
        "bg-about": "url('../img/redBackground.png')",
        "bg-author": "url('../img/author_bg.jpg')",
        "code-bg": "url('../img/code_bg.png')",
        "code-bg-white": "url('../img/code_bg_white.png')",
      },
    },
  },
  plugins: [],
};
