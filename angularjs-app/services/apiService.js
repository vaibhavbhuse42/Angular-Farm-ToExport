app.service('apiService', function($http){
    var baseUrl = 'http://13.233.134.21/FarmToExport/api/'; // server IP

    // User APIs
    this.register = function(data){ return $http.post(baseUrl + 'register.php', data); };
    this.login = function(data){ return $http.post(baseUrl + 'login.php', data); };

    // Categories / Subcategories
    this.getCategories = function(){ return $http.get(baseUrl + 'get_categories.php'); };
    this.getSubcategories = function(categoryId){ return $http.get(baseUrl + 'get_subcategories.php?category_id='+categoryId); };

    // Products
    this.getProducts = function(filters){ return $http.post(baseUrl + 'get_products.php', filters); };
    this.getProductDetail = function(productId){ return $http.get(baseUrl + 'get_product_detail.php?id=' + productId); };

    // Reviews
    this.getReviews = function(productId){ return $http.get(baseUrl + 'get_reviews.php?product_id=' + productId); };
    this.addReview = function(data){ return $http.post(baseUrl + 'add_review.php', data); };

    // Orders / Cart
    this.placeOrder = function(order){ return $http.post(baseUrl + 'place_order.php', order); };
    this.getOrders = function(userId){ return $http.get(baseUrl + 'get_orders.php?user_id='+userId); };

    // Admin APIs
    this.adminAddProduct = function(formData){
        return $http.post(baseUrl+'admin_add_product.php', formData, {transformRequest: angular.identity, headers:{'Content-Type': undefined}});
    };
    this.adminUpdateStock = function(data){ return $http.post(baseUrl+'admin_update_stock.php', data); };
    this.getNotifications = function(){ return $http.get(baseUrl+'get_notifications.php'); };
});

