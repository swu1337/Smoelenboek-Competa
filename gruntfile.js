"use strict";

module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: 'expanded'
        },
        files: {
          'build/css/style.css': 'src/sass/**/*.scss',
        }
      }
    },
    cssmin: {
      target: {
          files: [{
              expand: true,
              cwd: 'src/css/',
              src: ['style.css'],
              dest: 'build/css/',
              ext: '.css'
          }]
      }
    },
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['src/js/**/*.js'],
        dest: 'build/js/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dest: {
        files: {
          'build/js/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
        }
      }
    },
    jshint: {
      files: ['gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
      options: {
        // options here to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },
    watch: {
      sass: {
          files: "src/sass/**/*.scss",
          tasks: ['sass','cssmin']
      }
      // files: ['<%= jshint.files %>'],
      // tasks: ['jshint']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  grunt.registerTask('default', ['jshint', 'concat', 'uglify']);
  grunt.registerTask('test', ['sass', 'cssmin', 'concat', 'uglify']);
  grunt.registerTask('serve', ['watch']);

};
