module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    sass: {                             // Task
      dev: {                            // Target
        options: {                       // Target options
          style: 'expanded'
        },
        files: {                         // Dictionary of files
          'compiled/style.css': 'sass/style.scss',
           // 'destination': 'source'
        }
      },
      dist: {
        options: {
          style: 'compressed'
        },
        files: {                         // Dictionary of files
          'compiled/style-min.css': 'sass/style.scss',
           // 'destination': 'source'
        }
      }
    },

    watch: {
      css: {
        files: ['**/*.scss'],
        tasks: ['sass']
      }
    }

  });

  // Load Grunt plugins
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', [
    'sass',
    'watch'
    ]);

};