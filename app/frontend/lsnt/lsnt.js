angular.module('LSNTApp', [
    'ngRoute'
]).config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider ) {

    $routeProvider
        .when('/', {
            redirectTo: '/activity-feed'
        })

        .when('/login', {
            templateUrl: '/notFound/'//,
//            controller: 'LoginController'
        })

        .otherwise({
            redirectTo: '/notFound'
         });

    $locationProvider.html5Mode(true);
}]);
