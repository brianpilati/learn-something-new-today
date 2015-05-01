// Karma configuration
// Generated on Wed Apr 02 2014 15:53:09 GMT-0600 (MDT)
module.exports = function (config) {
    config.set({
        // base path, that will be used to resolve files and exclude
        basePath: '../../../',

        // frameworks to use
        frameworks: ['jasmine'],

        // list of files / patterns to load in the browser
        files: [
            'app/lib/jquery/dist/jquery.js',
            'app/lib/angular/angular.js',
            'app/lib/angular-animate/angular-animate.min.js',
            'app/lib/angular-route/angular-route.js',
            'app/lib/angular-mocks/angular-mocks.js',
            'app/lib/angular-cookies/angular-cookies.min.js',
            'app/lib/restangular/dist/restangular.js',
            'app/lib/angular-bootstrap/ui-bootstrap.js',
            'app/lib/angular-gettext/dist/angular-gettext.js',
            'app/lib/lodash/dist/lodash.js',
            'app/lib/ng-grid/build/ng-grid.debug.js',

            'app/lib/ISComponents/dist/isComponents.js',

            'app/frontend/lsnt/lsnt.js',
            'app/frontend/lsnt/**/*.js',
            'app/frontend/pages/**/*.js',

            'test/js/unit/artifacts/**/*.js',
            'test/js/unit/**/*.js'
        ],

        // list of files to exclude
        exclude: [
            'src/**/*Generator.js'
        ],

        preprocessors: {
            'src/**/!(*Generated).js': ['coverage']
        },

        // test results reporter to use
        // possible values: 'dots', 'progress', 'junit', 'growl', 'coverage'
        reporters: ['progress'],

        // web server port
        port: 9876,

        // enable / disable colors in the output (reporters and logs)
        colors: true,

        // level of logging
        // possible values: config.LOG_DISABLE || config.LOG_ERROR || config.LOG_WARN || config.LOG_INFO || config.LOG_DEBUG
        logLevel: config.LOG_INFO,

        // enable / disable watching file and executing tests whenever any file changes
        autoWatch: false,

        // Start these browsers, currently available:
        // - Chrome
        // - ChromeCanary
        // - Firefox
        // - Opera (has to be installed with `npm install karma-opera-launcher`)
        // - Safari (only Mac; has to be installed with `npm install karma-safari-launcher`)
        // - PhantomJS
        // - IE (only Windows; has to be installed with `npm install karma-ie-launcher`)
        browsers: ['Chrome'],

        // If browser does not capture in given timeout [ms], kill it
        captureTimeout: 60000,
        browserNoActivityTimeout: 100000,

        // Continuous Integration mode
        // if true, it capture browsers, run tests and exit
        singleRun: false,

        coverageReporter: {
            reporters: [
                {type: 'html', dir: 'build/test/html'},
                {type: 'cobertura', dir: 'build/test/xml', file: 'coverage.xml'}
            ]
        }
    });
};
