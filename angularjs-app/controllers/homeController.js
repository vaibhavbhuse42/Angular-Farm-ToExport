FarmToExport.controller('homeController', function($scope, productService, cartService) {
    $scope.products = [];

    // Load products from JSON
    productService.getProducts().then(function(response) {
        $scope.products = response.data;
    }, function(error) {
        console.error("Error loading products", error);
    });

    // Add product to cart
    $scope.addToCart = function(product) {
        cartService.addProduct(product);
        alert(product.name + " added to cart!");
    };
});

