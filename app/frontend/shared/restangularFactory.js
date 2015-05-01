angular.module('LSNTShared')
.factory('LSNTRestangular', ['Restangular', function (Restangular) {
    'use strict';
    var lsntRestangular = Restangular.withConfig(function (RestangularConfigurer) {
        RestangularConfigurer.setBaseUrl('https://lsnt.com/controllers');
    });

    return lsntRestangular;
}])
