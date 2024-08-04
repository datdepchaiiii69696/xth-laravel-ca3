@extends('layouts.app')
@section('content')
    <div class="mt-16">
        <div class="row">
            @foreach($products as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
                        <a href="#!">
                                <span class="badge badge-primary">
                                </span>
                            @if(str_contains($item->img_thumb, 'products/'))
                                <img src="{{Storage::url($item->img_thumb)}}" alt="" class="card-img-top rounded-0">
                            @else
                                <img src="{{$item->img_thumb}}" alt="" class="card-img-top rounded-0">
                            @endif
                            <div class="card-body">
                                <h4 class="text-uppercase mb-3">{{$item->name}}</h4>
                                <p class="h4 text-muted font-weight-light mb-3">{{$item->category->name}}</p>
                                <p class="h4">{{$item->price_sale ?: $item->price}}</p>
                            </div>
                            <a href="{{route('product.detail', $item->slug)}}" class="btn btn-primary">Xem chi tiết</a>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
