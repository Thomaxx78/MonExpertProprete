/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
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
