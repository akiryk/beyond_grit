module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    sass: {                             // Task
      dev: {                            // Target
        options: {                       // Target options
          style: 'expanded',
          sourcemap: 'auto'
        },
        files: {                         // Dictionary of files
          'style-human.css': 'sass/style.scss',
           // 'destination': 'source'
        }
      },
      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'auto'
        },
        files: {                         // Dictionary of files
          'style.css': 'sass/style.scss',
           // 'destination': 'source'
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
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');

  // Default task(s).
  grunt.registerTask('default', ['watch']);

};