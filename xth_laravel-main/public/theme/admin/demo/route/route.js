angular.module('myController',['ngRoute']).config(function($routeProvider){
    $routeProvider.when('/product/list',{
        templateUrl: 'views/list.html',
        controller: ProductListController
    })
    .when('/product/add',{
        templateUrl: 'views/add.html',
        controller: ProductAddController
    })
    .when('/product/detail/:id',{
        templateUrl: 'views/detail.html',
        controller: ProductDetailController
    })
    .when('/product/:id/edit',{
        templateUrl: 'views/edit.html',
        controller: ProductEditController
    })
});