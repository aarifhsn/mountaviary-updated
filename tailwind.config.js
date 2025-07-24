/** @type {import('tailwindcss').Config} */

export const content = ["./**/*.{html,js,php}"];
export const theme = {
  extend: {
    fontFamily: {
      montserrat: ["Montserrat", "sans-serif"],
      poppins: ["Poppins", "sans-serif"],
      robotoCondensed: ["Roboto Condensed", "sans-serif"],
    },
    backgroundImage: (theme) => ({
      "home-bg": "url('../img/home_bg.png')",
      "bg-left-nav": "url('../img/home_bg.png')",
      "bg-about": "url('../img/redBackground.png')",
      "bg-author": "url('../img/author_bg.jpg')",
    }),
  },
};
export const plugins = [];
