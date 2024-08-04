<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
<header>
    <div class="d-flex justify-content-end">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
    @endif
</header>
<div class="row align-items-center justify-content-center">
    <div class="row">
        <div class="content pl-lg-3 pl-0">
            <ul class="list-group">
                <li class="list-group-item p-3">
                    <h5 class="fw-bolder">Đơn hàng của bạn</h5>
                </li>
                @foreach($productVariants as $item)
                    <li class="list-group-item">
                        <div class="row align-items-center ">
                            <div class="col-2">
                                <div class="d-flex justify-content-center align-items-center"
                                     style="width: 40px; height: 40px;">
                                    @if(str_contains($item->product_img_thumb, 'products/'))
                                        <img src="{{Storage::url($item->product_img_thumb)}}" alt="" class="mw-100 mh-100">
                                    @else
                                        <img src="{{$item->product_img_thumb}}" alt="" class="mw-100 mh-100">
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <span class="fw-bolder">{{$item->product_name}}</span>
                                <span class="text-light">{{$item->product_sku}}</span>
                                <span class="text-light">Phân loại: {{$item->variant_size_name}} x {{$item->variant_color_name}}</span>
                            </div>
                            <div class="col-2 text-center ">
                                <span>{{$item->quantity}}</span>
                            </div>
                            <div class="col-4 text-end">
                                <span style="text-decoration: line-through; color:gray;">
                                    {{$item->product_price_sale ? $item->product_price : ''}}
                                </span>
                                <span>{{$item->product_price_sale ?: $item->product_price}}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="list-group-item d-grid gap-2">
                    <div class="d-flex justify-content-between align-items-center ">
                        <span>Tạm tính</span>
                        <span>{{$totalAmount}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center ">
                        <span>Shipping</span>
                        <span>0</span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <span class="fw-bold">Tổng</span>
                    <span class="fw-bold text-danger ">{{$totalAmount}} </span>
                </li>
            </ul>
        </div>
    </div>
    <form action="{{route('order.add')}}" class="container mt-4 d-flex justify-content-around" method="POST">
        @csrf
        <input type="hidden" name="productVariants" value="{{$productVariants}}">
        <input type="hidden" name="userId" value="{{$userId}}">
        <input type="hidden" name="totalAmount" value="{{$totalAmount}}">
        <div class="col-md-5">
            <h3>Thông tin người mua hàng</h3>
            <div class="mb-3">
                <label class="form-label">Họ tên:</label>
                <input type="text" class="form-control" name="user_name" placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" name="user_phone" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Emai:</label>
                <input type="text" class="form-control" name="user_email" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" name="user_address" placeholder="">
            </div>
            <div class="mb-3 ">
                <label class="card-title mb-2">Chọn hình thức thanh toán</label>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="payment" id="cod" value="cod">
                        <label class="form-check-label" for="cod">Thanh toán khi nhận hàng</label>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Thanh toán</button>
            </div>
        </div>
        <div class="col-md-5">
            <h3>Thông tin nhận hàng</h3>
            <div class="mb-3">
                <label class="form-label">Họ tên:</label>
                <input type="text" class="form-control" name="receiver_name" placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" name="receiver_phone" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Emai:</label>
                <input type="text" class="form-control" name="receiver_email" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" name="receiver_address" placeholder="">
            </div>
        </div>


    </form>
</div>
</body>
</html>
