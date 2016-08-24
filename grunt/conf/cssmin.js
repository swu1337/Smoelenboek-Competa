module.exports = {
    target: {
        files: [{
            expand: true,
            cwd: 'wp-content/themes/competa/',
            src: ['style.css'],
            dest: 'wp-content/themes/competa/',
            ext: '.css'
        }]
    }
};