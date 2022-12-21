/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {
      colors: {
        blueDark: '#183153',
        blueDarker: '#0E1021',
        orange: '#D98829',
        grayDivide: '#C3C6D1',
        grayBackground: '#C4C4C4',
        blueText: '#146EBE',
        blue: '#007AFF',
        red: '#FF7070',
        green: '#9ADA7B',
      },
      fontFamily: {
        sans: ['Nunito', 'sans-serif'],
        fugaz: ['Fugaz One', 'sans-serif'],
      },
      backgroundSize: {
        '10': '10rem',
      },
      maxHeight: {
        '70vh': '70vh',
      },
      zIndex: {
        '1000': '1000',
      },
    },
  },
  plugins: [],
}
