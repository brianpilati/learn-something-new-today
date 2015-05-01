angular.module('CategoryModule').factory('CategoryFactory', ['LSNTRestangular', function (LSNTRestangular) {
    'use strict';

    var categoryFactory = {};

    categoryFactory.url = 'category.php';

    categoryFactory.getCategories = function () {
        return LSNTRestangular.all(categoryFactory.url).getList();
    };

    categoryFactory.getColumnDefinition = function() {
        return [
            {field: 'action', displayName: 'Action'}
        ];
    };

    return categoryFactory;
}]);
