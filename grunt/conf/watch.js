module.exports = {
    options: {
        livereload: true
    },
    css: {
        files: ['src/sass/**/*.scss'],
        tasks: ['sass','cssmin']
    },
    js: {
        files: ['src/js/**/*.js'],
        tasks: ['jshint','concat','uglify',]
    },
    php: {
        files: ['src/php/**/*.php'],
        tasks: []
    }
};
