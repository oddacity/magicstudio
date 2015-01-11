'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'js/_*.js',
        '!gruntfile.js',
        '!js/scripts.min.js',
        '!js/main.min.js',
      ]
    },
    less: {
      dist: {
        files: {
          'style.min.css': [
            'css/style.less'
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: false,
          sourceMapFilename: 'assets/css/main.min.css.map',
          sourceMapRootpath: '/app/themes/roots/'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'js/scripts.min.js': [
            'js/vendor/*.js',
            '!js/vendor/jquery-1.11.0.min.js',
          ],
          'js/main.min.js': [
            'js/custom/*.js'
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    version: {
      options: {
        file: 'functions.php',
        css: 'style.min.css',
        cssHandle: 'magicstudio-style',
        js: 'js/scripts.min.js',
        jsHandle: 'magicstudio-vendor',
      }
    },
    watch: {
      less: {
        files: [
          'css/*.less',
          'css/modules/*.less'
        ],
        tasks: ['less', 'version']
      },
      js: {
        files: [
          'js/vendor/*.js',
          'js/custom/*.js',
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify', 'version']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'style.min.css',
          'js/scripts.min.js',
          'js/main.min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'style.min.css',
        'js/scripts.min.js',
        'js/main.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-wp-version');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify',
    'version'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};