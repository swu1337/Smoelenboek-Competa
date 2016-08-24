module.exports = function (grunt) {
    grunt.registerTask('serve', [
        'sass',
        'cssmin',
        'watch'
    ]);
};