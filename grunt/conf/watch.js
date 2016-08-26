module.exports = {
    options: {
        livereload: false
    },
    css: {
        files: ['src/sass/**/*.scs'],
        tasks: ['sass','cssmin']
    },
    js: {
        files: ['src/js/**/*.js'],
        tasks: []
    },
    php: {
        files: ['src/php/**/*.php'],
        tasks: []
    }
};
