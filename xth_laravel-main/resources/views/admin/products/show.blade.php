@extends('admin.layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Chi tiết sản phẩm</h1>

        <!-- Product Information -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><strong>ID:</strong> {{ $product->id }}</li>
                    <li><strong>Tên sản phẩm:</strong> {{ $product->name }}</li>
                    <li><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VND</li>
                    <li><strong>Giá sale:</strong> {{ number_format($product->price_sale, 0, ',', '.') }} VND</li>
                    <li><strong>Ảnh:</strong>
                        <div style="width: 100px; height: 100px;">
                            <img src="{{ asset($product->img_thumb) }}" alt="Ảnh sản phẩm" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    </li>
                    <li><strong>Trạng thái:</strong> {{ $product->is_active ? 'Hoạt động' : 'Không hoạt động' }}</li>
                </ul>
            </div>
        </div>

        <!-- Product Variants -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Biến thể sản phẩm</h5>
            </div>
            <div class="card-body">
                @if($product->variants->isEmpty())
                    <p>Chưa có biến thể nào cho sản phẩm này.</p>
                @else
                    <table class="table table-bordered">
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
                            @foreach($product->variants as $variant)
                                <tr>
                                    <td>{{ $variant->size->name ?? 'Không xác định' }}</td>
                                    <td>{{ $variant->color->name ?? 'Không xác định' }}</td>
                                    <td>
                                        @if($variant->image)
                                            <img src="{{ Storage::url($variant->image) }}" alt="Ảnh biến thể" class="img-fluid" style="width: 50px; height: auto;">
                                        @else
                                            Không có ảnh
                                        @endif
                                    </td>
                                    <td>{{ $variant->quantity }}</td>
                                    <td>{{ number_format($variant->price, 0, ',', '.') }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Debug Information -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Thông tin Debug</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    @foreach($product->toArray() as $key => $value)
                        <li><strong>{{ $key }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
