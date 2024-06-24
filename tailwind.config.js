/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        colors:{
            "orangeBurn":"#CC5500",
            "money":"#008000"

        },
        fontFamily:{
            "hanken_grotesk": ["Hanken Grotesk", "sans-serif"]
        },
    },
  },
  plugins: [],
}

