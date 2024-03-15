/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    borderRadius: {
      'custom60': '60px',
    },
  },
  plugins: [require("daisyui"), require('@tailwindcss/forms')],
  daisyui: {
    darkTheme: false,
  },
}

