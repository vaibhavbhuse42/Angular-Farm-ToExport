FarmToExport.service('productService', function($http) {
    this.getProducts = function() {
        return $http.get('data/products.json'); // Ensure this file exists
    };
});

