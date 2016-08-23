module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')({
                        browsers: ['last 2 versions']
                    })
                ]
            },
            dist: {
                src: 'blocks/image_link_with_content/css/*.css'
            }
        },
        sass: {
            dist: {
                files: {
                    'blocks/image_link_with_content/css/view.css': 'src/view.scss',
                }
            }
        },
        watch: {
            src: {
                files: ['src/view.scss'],
                tasks: ['default'],
            },
        },
    });

    grunt.registerTask('default', ['postcss:dist'], ['sass']);
};
