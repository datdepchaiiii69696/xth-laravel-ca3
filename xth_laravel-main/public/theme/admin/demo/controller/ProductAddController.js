window.ProductAddController = function($scope, $http, $location){
    var apiUrl="http://localhost:3000/products";
    // kiểm tra dữ liệu có hợp lệ hay không
    $scope.kiemTraDuLieu = {
        name: false,
        price: false,
    }

    $scope.onSubmit = function(){
        // gán 1 biến kiểm tra lỗi
        // nếu 1 trong 2 trường lỗi thì cập nhật thành true
        let flag = false;
        if(!$scope.inputValue || !$scope.inputValue.name){
            // nếu không có inputValue hoặc inputValue.name
            // thì lập tức chuyển thành true
            $scope.kiemTraDuLieu.name= true;
            flag = true;
        }
        if(!$scope.inputValue || !$scope.inputValue.price){
            // nếu không có inputValue hoặc inputValue.price
            // thì lập tức chuyển thành true
            $scope.kiemTraDuLieu.price= true;
            flag = true;
        }
        if(!flag){
            // tạo ra đối tượng item để thêm vào
            var newItem = {
                ...$scope.inputValue,
            }
            // khi thêm dữ liệu mới vào thì phải sử dụng đoạn code sau
            // bằng phương thức post
            $http.post(
                apiUrl,
                newItem
            ).then(function(response){
                if(response.status == 201){
                    $location.path('/product/list')
                }
            })
        }
    }
}