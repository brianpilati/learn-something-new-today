module.exports = function (grunt) {
    'use strict';

    /** @namespace grunt.initConfig */
    grunt.initConfig({
        watch: {
            sass: {
                files: 'app/css/**/*.scss',
                tasks: ['sass']
            },
            scsslint: {
                files: 'app/css/**/*.scss',
                tasks: ['scsslint']
            },
            phpunit: {
                files: ['app/php/**/*.php', 'test/php/unit/**/*Test.php'],
                tasks: ['phpunit']
            }
        },
        exec: {
            npm: 'npm install --no-bin-links'
        },
        clean: {
            build: ['build'],
            lib: ['app/src/lib'],
            test: ['build/test'],
            shadowSrc: ['test/php/shadowSrc'],
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
                    'app/src/lib/lsnt.min.css': 'app/css/lsnt.scss'
                }
            },
            compact: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'app/src/lib/lsnt.css': 'app/css/lsnt.scss'
                }
            }
        },
        scsslint: {
            allFiles: [
                'app/css/**/*.scss'
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
            },
            images: {
                cwd: 'app/images',
                src: '**/*',
                dest: 'app/src/images',
                expand: true
            }
        },
        phpunit: {
            dir: 'test/php/unit',
            options: {
                bin: 'vendor/bin/phpunit',
                bootstrap: 'test/php/bootstrap.php',
                colors: true,
                verborse: true,
                stderr: false,
                //debug: true,
                followOutput: true
            }
        }
    });

    grunt.registerTask('default', ['build']);
    grunt.registerTask('install', ['exec:npm']);

    grunt.registerTask('css', ['sass']);
    grunt.registerTask('css-auto', ['watch:sass']);
    grunt.registerTask('lint-auto', ['watch:scsslint']);

    grunt.registerTask('lint', ['scsslint']);
    grunt.registerTask('build-setup', ['clean:build', 'clean:lib', 'install', 'lint', 'phptest', 'css', 'copy:images']);
    grunt.registerTask('build', ['build-setup']);

    grunt.registerTask('phptest', ['clean:shadowSrc', 'phpunit']);
    grunt.registerTask('php-auto', ['watch:phpunit']);

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-scss-lint');
    grunt.loadNpmTasks('grunt-exec');
    grunt.loadNpmTasks('grunt-phpunit');
};
