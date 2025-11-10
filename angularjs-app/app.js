// Define the AngularJS module
var FarmToExport = angular.module('FarmToExport', ['ngRoute']);

// Configure routes
FarmToExport.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'views/home.html',
            controller: 'homeController'
        })
        .when('/cart', {
            templateUrl: 'views/cart.html',
            controller: 'cartController'
        })
        .when('/login', {
            templateUrl: 'views/login.html',
            controller: 'loginController'
        })
        .when('/register', {
            templateUrl: 'views/register.html',
            controller: 'registerController'
        })
        .otherwise({
            redirectTo: '/'
        });
});

