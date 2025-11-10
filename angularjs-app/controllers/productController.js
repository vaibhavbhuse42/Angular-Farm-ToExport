angular.module('FarmApp')
.controller('productController', function($scope, cartService) {
    // Example products, replace with API call if needed
    $scope.products = [
        {id:1, name:'Apple', price:50},
        {id:2, name:'Banana', price:20},
        {id:3, name:'Orange', price:30}
    ];

    $scope.addToCart = function(product) {
        cartService.addToCart(product);
        alert(product.name + ' added to cart!');
    };
});
