app.controller('adminController', function($scope, apiService, $http){
    $scope.products=[];
    $scope.loadProducts = function(){
        apiService.getProducts({}).then(r=>$scope.products=r.data.products);
    }
    $scope.loadProducts();

    $scope.addProduct = function(form){
        var fd = new FormData();
        fd.append('name',$scope.newProduct.name);
        fd.append('subcategory_id',$scope.newProduct.subcategory_id);
        fd.append('price',$scope.newProduct.price);
        fd.append('stock',$scope.newProduct.stock);
        fd.append('description',$scope.newProduct.description);
        fd.append('image',$scope.newProduct.image);

        $http.post('http://localhost/api/admin_add_product.php', fd, {transformRequest: angular.identity, headers: {'Content-Type': undefined}}).then(r=>{
            alert(r.data.message);
            $scope.loadProducts();
        });
    }

    // Analytics using Chart.js
    $scope.loadAnalytics=function(){
        var ctx=document.getElementById('salesChart').getContext('2d');
        new Chart(ctx,{type:'bar',data:{labels:['Red Onion','White Onion','Onion Powder'],datasets:[{label:'Sales',data:[30,20,15],backgroundColor:'green'}]}});
    }
});
