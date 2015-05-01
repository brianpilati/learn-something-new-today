angular.module('LSNTApp', [
    'ngRoute',
    'CategoryModule',
    'LSNTShared'
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

angular.module('LSNTShared', ['isComponents']).config(['RestangularProvider', function(RestangularProvider) {
    RestangularProvider.setBaseUrl('/');
    RestangularProvider.addResponseInterceptor(function (data, operation) {
        var extractedData;
        if (operation === "getList") {
            extractedData = data.data;
        } else {
            extractedData = data;
        }
        return extractedData;
    });
}]);
angular.module('CategoryModule', ['LSNTShared']);
