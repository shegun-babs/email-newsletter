const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: [
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        fontFamily: {
            sans: ['Lato', ...defaultTheme.fontFamily.sans],
        },
    },
  },
  variants: {},
  plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
  ],
}
