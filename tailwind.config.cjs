 /** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./*.{js,jsx,tsx,php,html,css}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'Inter': ['"Inter"'],
      },
      colors: {
        'gen-blue': '#0647F4',
      }
    },
  },
  plugins: [],
}