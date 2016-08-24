module.exports = {
    options: {
        livereload: true
    },
    php: {
        files: ['wp-content/themes/competa/**/*.php'],
        tasks: []
    },
    css: {
        files: ['wp-content/themes/competa/assets/sass/**/*.sass'],
        tasks: ['sass', 'cssmin']
    },
    js: {
        files: ['wp-content/themes/competa/assets/js/**/*.js'],
        tasks: []
    }
};