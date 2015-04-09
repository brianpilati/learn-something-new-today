module.exports = function (grunt) {
    'use strict';

    /** @namespace grunt.initConfig */
    grunt.initConfig({
        watch: {
            sass: {
                files: 'src/**/*.scss',
                tasks: ['sass']
            },
            scsslint: {
                files: 'src/**/*.scss',
                tasks: ['scsslint']
            }
        },
        exec: {
            npm: 'npm install --no-bin-links'
        },
        clean: {
            build: ['build'],
            lib: ['src/lib'],
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
                    'src/lib/lsnt.min.css': 'src/lsnt/lsnt.scss'
                }
            },
            compact: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'src/lib/lsnt.css': 'src/lsnt/lsnt.scss'
                }
            }
        },
        scsslint: {
            allFiles: [
                'src/**/*.scss'
            ],
            options: {
                config: '.scss-lint.yml',
                colorizeOutput: true
            }
        },
        copy: {
            index: {
                src: 'src/index-production.html',
                dest: 'src/index.html'
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
