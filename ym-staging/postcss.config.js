module.exports = {
  parser: false,
  map: false,
  from: 'style.css',
  to: 'style.css',
  plugins: {
    'postcss-assets': {},
    'lost': {},
    'postcss-ant': {},
    'postcss-property-lookup': {},
    'rucksack-css': {
      fallbacks: true,
      autoprefixer: true,
      reporter: true
    },
    'postcss-autoreset': {
      reset: {
        margin: 'auto',
        padding: 0,
        width: 'auto'
      }
    },
    'postcss-initial': {}
  }
}

