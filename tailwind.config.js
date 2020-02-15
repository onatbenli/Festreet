module.exports = {
  theme: {
      filter: { // defaults to {}
          'none': 'none',
          'grayscale': 'grayscale(1)',
          'invert': 'invert(1)',
          'sepia': 'sepia(1)',
      },
      backdropFilter: { // defaults to {}
          'none': 'none',
          'blur': 'blur(20px)',
      },
      transitionProperty: { // defaults to these values
          'none': 'none',
          'all': 'all',
          'color': 'color',
          'bg': 'background-color',
          'border': 'border-color',
          'colors': ['color', 'background-color', 'border-color'],
          'opacity': 'opacity',
          'transform': 'transform',
      },
      transitionDuration: { // defaults to these values
          'default': '250ms',
          '0': '0ms',
          '100': '100ms',
          '250': '250ms',
          '500': '500ms',
          '750': '750ms',
          '1000': '1000ms',
      },
      transitionTimingFunction: { // defaults to these values
          'default': 'ease',
          'linear': 'linear',
          'ease': 'ease',
          'ease-in': 'ease-in',
          'ease-out': 'ease-out',
          'ease-in-out': 'ease-in-out',
      },
      transitionDelay: { // defaults to these values
          'default': '0ms',
          '0': '0ms',
          '100': '100ms',
          '250': '250ms',
          '500': '500ms',
          '750': '750ms',
          '1000': '1000ms',
      },
      willChange: { // defaults to these values
          'auto': 'auto',
          'scroll': 'scroll-position',
          'contents': 'contents',
          'opacity': 'opacity',
          'transform': 'transform',
      },
      gradients: theme => ({
          // Array definition (defaults to linear gradients).
          'topaz':      ['30deg', theme('colors.orange.500'), theme('colors.pink.400')],
          'topaz-dark': ['30deg', theme('colors.orange.700'), theme('colors.pink.600')],
          'emerald':    ['to right', theme('colors.green.400'), theme('colors.teal.500')],
          'fireopal':   ['to right', '#40E0D0', '#FF8C00', '#FF0080'],
          'relay':      ['to top left', '#3A1C71', '#D76D77', '#FFAF7B'],

          // Object definition.
          'mono-circle': {
              type: 'radial',
              colors: ['circle', '#CCC', '#000']
          },
      }),
      linearBorderGradients: {
          directions: { // defaults to these values
              't': 'to top',
              'tr': 'to top right',
              'r': 'to right',
              'br': 'to bottom right',
              'b': 'to bottom',
              'bl': 'to bottom left',
              'l': 'to left',
              'tl': 'to top left',
          },
          colors: { // defaults to {}
              'red': '#f00',
              'red-blue': ['#f00', '#00f'],
              'red-green-blue': ['#f00', '#0f0', '#00f'],
              'black-white-with-stops': ['#000', '#000 45%', '#fff 55%', '#fff'],
          },
      },
      repeatingLinearBorderGradients: theme => ({
          directions: theme('linearBorderGradients.directions'), // defaults to the same values as linearBorderGradients’ directions
          colors: theme('linearBorderGradients.colors'), // defaults to {}
          lengths: { // defaults to {}
              'sm': '25px',
              'md': '50px',
              'lg': '100px',
          },
      }),
    extend: {
        colors: {
            'primary': {
                100: '#FCE9ED',
                200: '#F8C8D3',
                300: '#F3A7B9',
                400: '#EA6584',
                500: '#E1234F',
                600: '#CB2047',
                700: '#87152F',
                800: '#651024',
                900: '#440B18',
            },
            'secondary' : '#574142',
            'secondary-100' : '#ECD1D2',
            'secondary-200' : '#C5AAAB',
            'secondary-300' : '#9E8586',
            'secondary-400' : '#7A6263',
            'white': '#FFF',
        }
    }
  },

    variants: {
        gradients: ['responsive', 'hover'],
        transitionProperty: ['responsive'],
        transitionDuration: ['responsive'],
        transitionTimingFunction: ['responsive'],
        transitionDelay: ['responsive'],
        willChange: ['responsive'],
        filter: ['responsive'], // defaults to ['responsive']
        backdropFilter: ['responsive'], // defaults to ['responsive']
        linearBorderGradients: ['responsive'], // defaults to ['responsive']
        repeatingLinearBorderGradients: ['responsive'], // defaults to ['responsive']
    },
    plugins: [
        require('tailwindcss-plugins/gradients'),
        require('tailwindcss-transitions')(),
        require('tailwindcss-filters')(),
        require('tailwindcss-border-gradients')(),
    ],
}
