module.exports = {
    target: {
        files: [{
            expand: true,
            cwd: 'src/css/',
            src: ['*.css', '!*.min.css'],
            dest: 'build/css/',
            ext: '.min.css'
        }]
    }
};
