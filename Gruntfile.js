module.exports = function(grunt) {
    grunt.initConfig({
        watch: {
            options: {
                livereload: true
            },
            scripts: {
                files: ['js/*.js'],
                tasks: ['dist']
            }
        },
        concat: {
            dist: {
                src: 'js/*.js',
                dest: 'local/js/all.js'
            }
        },
        uglify: {
            dist: {
                files: {
                    'local/js/all.min.js': ['local/js/all.js']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.registerTask('default', ['concat', 'uglify']);
};
