 /** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./*.{js,jsx,tsx,php,html,css}",
    "./index.php",
    "./src/**/*.{js,jsx,tsx,php}",
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