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
                dest: 'js/min/all.js'
            }
        },
        uglify: {
            dist: {
                files: {
                    'js/min/all.min.js': ['js/min/all.js']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.registerTask('default', ['concat', 'uglify']);
};
