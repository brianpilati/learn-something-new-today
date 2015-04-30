angular.module('LSNTApp', [
    'ngRoute'
]).config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider ) {

    $routeProvider
        .when('/', {
            templateUrl: 'pages/splash/index.html'
        })

        .otherwise({
            redirectTo: 'pages/notFound'
        });

    $locationProvider.html5Mode(true);
}]);
