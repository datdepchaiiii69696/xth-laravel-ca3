window.ProductEditController = function($scope,$http,$routeParams,$location){
    var apiUrl = "http://localhost:3000/products";
    var editId = $routeParams.id;

    $scope.getProductInfo = function(){
        $http.get(`${apiUrl}/${editId}`).then(
            function(response){
                if(response.status == 200){
                    $scope.product = response.data;
                    $scope.inputValue = {
                        name: response.data.name,
                        price: response.data.price,
                    }
                }
            }
        ).catch(function(error){
            $scope.message = `${error.statusText} product with id ${editId}`;
        })
    }
    $scope.getProductInfo();

    $scope.kiemTraDuLieu = {
        name: false,
        price: false,
    }

    $scope.onEditForm = function(){
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
            var updateItem = {
                ...$scope.inputValue,
            }
            // khi thêm dữ liệu mới vào thì phải sử dụng đoạn code sau
            // bằng phương thức post
            $http.put(
                `${apiUrl}/${editId}`,
                updateItem
            ).then(function(response){
                if(response.status == 200){
                    $location.path('/product/list')
                }
            })
        }
    }
}