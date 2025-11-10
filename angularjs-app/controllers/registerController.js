FarmToExport.controller('registerController', function($scope) {
    $scope.register = function() {
        if($scope.username && $scope.email && $scope.password){
            alert("Registered successfully!\nUsername: " + $scope.username + "\nEmail: " + $scope.email);
        } else {
            alert("Please fill all registration fields!");
        }
    };
});
