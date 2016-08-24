module.exports = function (grunt) {
    grunt.registerTask('vagrant', [
        'sass',
        'copy',
        'cssmin',
        'watch'
    ]);
};