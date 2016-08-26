module.exports = function (grunt) {
    grunt.registerTask('serve', [
        'sass',
        'cssmin',
        'jshint',
        'concat',
        'uglify',
        'watch'
    ]);
};
