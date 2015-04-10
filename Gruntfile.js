module.exports = function (grunt) {
    'use strict';

    /** @namespace grunt.initConfig */
    grunt.initConfig({
        watch: {
            sass: {
                files: 'app/src/**/*.scss',
                tasks: ['sass']
            },
            scsslint: {
                files: 'app/src/**/*.scss',
                tasks: ['scsslint']
            }
        },
        exec: {
            npm: 'npm install --no-bin-links'
        },
        clean: {
            build: ['build'],
            lib: ['app/lib'],
            test: ['build/test'],
            e2e: ['build/test/e2e']
        },
        sass: {
            options: {
                unixNewlines: true
            },
            mini: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'app/lib/lsnt.min.css': 'app/src/lsnt/lsnt.scss'
                }
            },
            compact: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'app/lib/lsnt.css': 'app/src/lsnt/lsnt.scss'
                }
            }
        },
        scsslint: {
            allFiles: [
                'app/src/**/*.scss'
            ],
            options: {
                config: '.scss-lint.yml',
                colorizeOutput: true
            }
        },
        copy: {
            index: {
                src: 'app/src/index-production.html',
                dest: 'app/src/index.html'
            }
        }
    });

    grunt.registerTask('default', ['build']);
    grunt.registerTask('install', ['exec:npm']);

    grunt.registerTask('css', ['sass']);
    grunt.registerTask('css-auto', ['watch:sass']);
    grunt.registerTask('lint-auto', ['watch:scsslint']);

    grunt.registerTask('lint', ['scsslint']);
    grunt.registerTask('build-setup', ['clean:build', 'clean:lib', 'install', 'lint', 'css']);
    grunt.registerTask('build', ['build-setup']);


    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-scss-lint');
    grunt.loadNpmTasks('grunt-exec');
};
