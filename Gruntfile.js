module.exports = function (grunt) {
    'use strict';

    var karmaWatchFiles = getWatchFiles();

    var karmaFiles = [
        'app/lib/jquery/dist/jquery.js',
        'app/lib/angular/angular.js',
        'app/lib/angular-route/angular-route.js',
        'app/lib/angular-animate/angular-animate.min.js',
        'app/lib/angular-mocks/angular-mocks.js',
        'app/lib/angular-cookies/angular-cookies.min.js',
        'app/lib/restangular/dist/restangular.js',
        'app/lib/ISComponents/dist/isComponents.js',
        'app/lib/angular-bootstrap/ui-bootstrap.js',
        'app/lib/angular-gettext/dist/angular-gettext.js',
        'app/lib/lodash/dist/lodash.js',
        'app/lib/ng-grid/build/ng-grid.debug.js',

        'app/lib/ISComponents/dist/isComponents.js',

        'app/frontend/lsnt/lsnt.js',
        'app/frontend/lsnt/**/*.js',
        'app/frontend/shared/**/*.js',
        'app/frontend/pages/**/*.js',

        'test/js/unit/artifacts/**/*.js',
        karmaWatchFiles
    ];

    /** @namespace grunt.initConfig */
    grunt.initConfig({
        watch: {
            sass: {
                files: ['app/css/**/*.scss', 'app/frontend/**/*.scss'],
                tasks: ['sass']
            },
            scsslint: {
                files: ['app/css/**/*.scss', 'app/frontend/**/*/scss'],
                tasks: ['scsslint']
            },
            phpunit: {
                files: ['app/php/**/*.php', 'test/php/unit/**/*Test.php'],
                tasks: ['phpunit']
            },
            karma: {
                files: ['app/frontend/**/*.js', 'test/js/unit/**/*.js'],
                tasks: ['karma:auto:run'] //NOTE the :run flag
            },
        },
        karma: {
            options: {
                browsers: ['Chrome'],
                singleRun: true,
                configFile: './test/js/unit/karma.conf.js',
                reporters: ['progress', 'coverage'],
                files: karmaFiles
            },
            src: { },
            auto: {
                browsers: ['Chrome'],
                singleRun: false,
                background: true
            }
        },
        exec: {
            npm: 'npm install --no-bin-links'
        },
        clean: {
            build: ['build'],
            test: ['build/test'],
            lib: ['app/src/lib'],
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
                    'app/src/lib/lsnt.min.css': 'app/css/lsnt.scss',
                    'app/frontend/build/lsnt.min.css': 'app/frontend/lsnt/lsnt.scss'
                }
            },
            compact: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'app/src/lib/lsnt.css': 'app/css/lsnt.scss',
                    'app/frontend/build/lsnt.css': 'app/frontend/lsnt/lsnt.scss'
                }
            }
        },
        scsslint: {
            allFiles: [
                'app/css/**/*.scss',
                'frontend/css/**/*.scss'
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
            },
            fonts: {
                expand: true,
                cwd: 'app/fonts',
                src: '*',
                dest: 'app/src/lib/fonts'
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
        },

        "ddescribe-iit": {
            files: [
                'test/js/**/*.js'
            ]
        }
    });

    grunt.registerTask('default', ['build']);
    grunt.registerTask('install', ['exec:npm']);
    grunt.registerTask('test', ['clean:test', 'karma:src']);

    grunt.registerTask('test-auto', ['karma:auto', 'watch:karma']);

    grunt.registerTask('css', ['sass']);
    grunt.registerTask('css-auto', ['watch:sass']);
    grunt.registerTask('lint-auto', ['watch:scsslint']);

    grunt.registerTask('lint', ['ddescribe-iit', 'scsslint']);
    grunt.registerTask('build-setup', ['clean:build', 'clean:lib', 'install', 'lint', 'karma:src', 'phptest', 'css', 'copy:images', 'copy:fonts']);
    grunt.registerTask('build', ['build-setup']);

    grunt.registerTask('phptest', ['clean:shadowSrc', 'phpunit']);
    grunt.registerTask('php-auto', ['watch:phpunit']);

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-ddescribe-iit');
    grunt.loadNpmTasks('grunt-karma');
    grunt.loadNpmTasks('grunt-exec');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.loadNpmTasks('grunt-scss-lint');

    function getWatchFiles(testType) {
        var testDir = (testType ? (testType + '/') : '');

        var files = 'test/js/' + testDir + 'unit/**/';
        if (grunt.option('grep')) {
            files += ('*' + grunt.option('grep') + '*');
        } else {
            files += (testType ? '*Spec.js' : '*.js');
        }

        return files;
    }
};
