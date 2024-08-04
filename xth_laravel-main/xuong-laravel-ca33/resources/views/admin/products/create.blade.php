@extends('admin.layouts.master')

@section('title')
    Tạo mới sản phẩm
@endsection
@section('style-libs')
    <!-- Plugins css -->
    <link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('script-libs')
    <!-- ckeditor -->
    <script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <!-- dropzone js -->
    <script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>

    <script src="{{asset('theme/admin/js/create-product.init.js')}}"></script>
@endsection
@section('content')
    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!--   left content-->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Main products information -->
                    <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductInfo">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="product-title-input" placeholder="Tên sản phẩm"
                                       name="name">
                            </div>
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Giá</label>
                                <input type="text" class="form-control" id="product-title-input" placeholder="Giá sản phẩm"
                                       name="price">
                            </div>
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Giá sale</label>
                                <input type="text" class="form-control" id="product-title-input" placeholder="Giá giảm"
                                       name="price_sale">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Description</label>
                                <div id="ckeditor-classic" name="description">
                                    <ul>
                                        <li>Full Sleeve</li>
                                        <li>Cotton</li>
                                        <li>All Sizes available</li>
                                        <li>4 Different Color</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    gallery -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Ảnh sản phẩm</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductGallery">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Ảnh sản phẩm</h5>
                                <p class="text-muted">Thêm ảnh sản phẩm</p>
                                <input type="file" name="img_thumb" class="form-control">
                                {{--                            <div class="text-center">--}}
                                {{--                                <div class="position-relative d-inline-block">--}}
                                {{--                                    <div class="position-absolute top-100 start-100 translate-middle">--}}
                                {{--                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">--}}
                                {{--                                            <div class="avatar-xs">--}}
                                {{--                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">--}}
                                {{--                                                    <i class="fa-solid fa-upload"></i>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </label>--}}
                                {{--                                        <input class="form-control d-none" value="" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="avatar-lg">--}}
                                {{--                                        <div class="avatar-title bg-light rounded">--}}
                                {{--                                            <img src="" id="product-img" class="avatar-md h-auto" />--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>
                            <div>
                                <h5 class="fs-14 mb-1">Thư viện ảnh</h5>
                                <p class="text-muted">Thêm thư viện ảnh sản phẩm</p>
                                <input type="file" name="product_galleries[]" multiple class="form-control">

                                {{--                            <div class="dropzone">--}}
                                {{--                                <div class="fallback">--}}
                                {{--                                    <input name="file" type="file" multiple="multiple">--}}
                                {{--                                </div>--}}
                                {{--                                <div class="dz-message needsclick">--}}
                                {{--                                    <div class="mb-3">--}}
                                {{--                                        <i class="fa-solid fa-cloud-arrow-up fa-3x"></i>--}}
                                {{--                                    </div>--}}

                                {{--                                    <h5>Drop files here or click to upload.</h5>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                                {{--                            <ul class="list-unstyled mb-0" id="dropzone-preview">--}}
                                {{--                                <li class="mt-2" id="dropzone-preview-list">--}}
                                {{--                                    <!-- This is used as the file preview template -->--}}
                                {{--                                    <div class="border rounded">--}}
                                {{--                                        <div class="d-flex p-2">--}}
                                {{--                                            <div class="flex-shrink-0 me-3">--}}
                                {{--                                                <div class="avatar-sm bg-light rounded">--}}
                                {{--                                                    <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="flex-grow-1">--}}
                                {{--                                                <div class="pt-1">--}}
                                {{--                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>--}}
                                {{--                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>--}}
                                {{--                                                    <strong class="error text-danger" data-dz-errormessage></strong>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="flex-shrink-0 ms-3">--}}
                                {{--                                                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                                {{--                            </ul>--}}
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                {{--            Biến thể sản phẩm--}}
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Biến thể sản phẩm</h6>
                    </a>
                    <div class="collapse show" id="collapseProductGallery">
                        <div class="card-body">
                            <div class="mb-4">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Màu</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $rows = 5; @endphp
                                    @for($index = 1; $index <= $rows; $index++)
                                        <tr>
                                            <td>
                                                <select name="product_variants[{{$index}}][size]" class="form-control">
                                                    @foreach($sizes as $size_id => $size_name)
                                                        <option value="{{$size_id}}">{{$size_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[{{$index}}][color]" class="form-control">
                                                    @foreach($colors as $color_id => $color_name)
                                                        <option value="{{$color_id}}">{{$color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[{{$index}}][image]" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" name="product_variants[{{$index}}][quantity]" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" name="product_variants[{{$index}}][price]" class="form-control">
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                                <button class="btn btn-info">Thêm biến thể</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                        Button -->

                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-success w-sm">Submit</button>
                </div>
            </div>
            <!-- end left content    -->
            <!-- right content          -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseStatus" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Trạng thái sản phẩm</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseStatus">
                        <!-- end card body -->
                        <div class="card-body">
                            <label for="choices-category-input" class="form-label">Danh mục sản phẩm</label>
                            <select class="form-control" aria-label="Default select example"
                                    id="choices-category-input" name="category_id">
                                @foreach($categories as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                            <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                            <select class="form-control form-select-lg mb-3" id="choices-publish-status-input"
                                    aria-label="Default select example">
                                <option selected>--Chọn trạng thái--</option>
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                            @php
                                $types = [
                                    'is_best_sale' => 'Bán chạy',
                                    'is_40_sale' => 'Giảm 40%',
                                    'is_hot_online' => 'Hot online',
                                ];
                            @endphp
                            <label for="choices-publish-type-input" class="form-label">Loại sản phẩm</label>
                            <div class="d-flex align-items-center">
                                @foreach($types as $key => $value)
                                    <div class="form-group custom-control custom-checkbox small col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-{{$key}}"
                                               name="{{$key}}">
                                        <label for="customCheck-{{$key}}" class="custom-control-label">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <label for="choices-publish-type-input" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="sku" value="{{strtoupper(\Str::random(9))}}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end right content       -->

        </div>
    </form>
@endsection
