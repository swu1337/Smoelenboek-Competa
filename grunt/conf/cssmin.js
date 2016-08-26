module.exports = {
    target: {
        files: [{
            expand: true,
            cwd: 'build/css/',
            src: ['*.css', '!*.min.css'],
            dest: 'build/css',
            ext: '.min.css'
        }]
    }
};