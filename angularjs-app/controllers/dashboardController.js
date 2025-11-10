app.controller('dashboardController', function($scope, apiService){
    $scope.user = JSON.parse(localStorage.getItem('user') || '{}');
    $scope.orders = [];

    if($scope.user.id){
        apiService.getOrders($scope.user.id).then(r=>{
            $scope.orders = r.data.orders;
        });
    }
});
