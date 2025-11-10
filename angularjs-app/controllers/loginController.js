FarmToExport.controller('loginController', function($scope) {
    // Example: you can replace this with real auth later
    $scope.login = function() {
        if($scope.email && $scope.password){
            alert("Logged in successfully!\nEmail: " + $scope.email);
        } else {
            alert("Please enter both email and password!");
        }
    };
});

