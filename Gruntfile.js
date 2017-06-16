module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        outputStyle: 'compressed',
        sourceMap: true
      },
      dist: {
        files: {
          'style.css': 'sass/style.scss'
        }
      }
    },

    postcss: {
      options: {
        map: true, // inline sourcemaps
        processors: [
          require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
        ]
      },
      dist: {
        src: '*.css'
      }
    },

    watch: {
      css: {
        files: ['**/*.scss'],
        tasks: ['sass','postcss']
      }
    }

  });

  // Load Grunt plugins
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');

  // Default task(s).
  grunt.registerTask('watch', ['watch']);
  grunt.registerTask('default', ['postcss', 'sass']);
  grunt.registerTask('build',['postcss', 'sass']);
};