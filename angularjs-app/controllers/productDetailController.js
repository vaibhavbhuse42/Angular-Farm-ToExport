app.controller('productDetailController', function($scope, $routeParams, apiService){
    $scope.product={}; $scope.reviews=[]; $scope.newReview={rating:0,comment:''};

    apiService.getProductDetail($routeParams.id).then(r=>$scope.product=r.data.product);
    apiService.getReviews($routeParams.id).then(r=>$scope.reviews=r.data.reviews);

    $scope.submitReview=function(){
        var review={
            user_id:1, // replace with logged-in user
            product_id:$scope.product.id,
            rating:$scope.newReview.rating,
            comment:$scope.newReview.comment
        };
        apiService.addReview(review).then(r=>{
            $scope.reviews.push(review);
            $scope.newReview={rating:0,comment:''};
        });
    }
});
