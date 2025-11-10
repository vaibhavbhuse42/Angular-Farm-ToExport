FarmToExport.service('cartService', function() {
    var cart = [];

    this.addProduct = function(product) {
        cart.push(product);
    };

    this.getCart = function() {
        return cart;
    };

    this.removeProduct = function(index) {
        cart.splice(index, 1);
    };

    this.clearCart = function() {
        cart = [];
    };
});

