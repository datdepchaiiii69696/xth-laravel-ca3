@extends('layouts.app')
@section('content')
    <div class="row align-items-center justify-content-center mt-16">
        <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
            <div class="image-wrapper">
                @if(str_contains($product->img_thumb, 'products/'))
                    <img src="{{Storage::url($product->img_thumb)}}" alt="" class="card-img-top rounded-0">
                @else
                    <img src="{{$product->img_thumb}}" alt="" class="card-img-top rounded-0">
                @endif
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="content pl-lg-3 pl-0">
                <h2 id="helllo-im-richi-andorn-im-a-biography-based-researcher-and-author">
                    {{$product->name}}</h2>
                <span class="text-dark">Mã sản phẩm: {{$product->sku}}</span> <br>
                <span class="text-dark">Danh mục sản phẩm: {{$product->category->name}}</span> <br>
                <span class="text-dark">Giá: <span class="text-danger">{{$product->price_sale ?: $product->price}}</span> </span>
                <span class="text-gray">{{$product->price_sale ? $product->price : ''}}</span>
                <p>{{$product->description}}</p>

                <div class="mt-3">
                    <form action="{{route('cart.add')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div>
                            <label class="form-check-label">Kích thước:</label>
                            @foreach($sizes as $id => $name)
                                <input type="radio" style="pointer-events: none; clip: rect(0,0,0,0);
                                position: absolute;" class="form-check" name="product_size_id" value="{{$id}}"
                                id="radio_size_{{$id}}">
                                <label class="btn btn-light" for="radio_size_{{$id}}">{{$name}}</label>
                            @endforeach
                        </div>
                        <div>
                            <label class="form-check-label">Màu:</label>
                            @foreach($colors as $id => $name)
                                <input type="radio" style="pointer-events: none; clip: rect(0,0,0,0);
                                position: absolute;" class="form-check" name="product_color_id" value="{{$id}}"
                                       id="radio_color_{{$id}}">
                                <label class="btn btn-light" for="radio_color_{{$id}}">{{$name}}</label>
                            @endforeach
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
