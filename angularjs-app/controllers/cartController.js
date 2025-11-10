FarmToExport.controller('cartController', function($scope, cartService) {
    $scope.cart = cartService.getCart();

    $scope.removeFromCart = function(index) {
        cartService.removeProduct(index);
    };

    $scope.placeOrder = function() {
        if($scope.cart.length === 0){
            alert("Cart is empty!");
            return;
        }
        alert("Order placed successfully!");
        cartService.clearCart();
        $scope.cart = cartService.getCart();
    };
});
