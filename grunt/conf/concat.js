module.exports = {
    options: {
        separator: ';'
    },
    dist: {
        src: ['src/js/**/*.js', 'grunt/*.js'],
        dest: 'build/js/app.min.js'
    }
};
