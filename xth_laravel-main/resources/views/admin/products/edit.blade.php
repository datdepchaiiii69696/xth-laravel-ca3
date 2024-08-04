@extends('admin.layouts.master')

@section('title')
    Cập nhật sản phẩm
@endsection

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Product Name -->
        <div class="mb-3">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
        </div>

        <!-- SKU -->
        <div class="mb-3">
            <label for="sku">SKU:</label>
            <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control">
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id">Danh mục:</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" {{ $product->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Thumbnail img_thumb -->
        <div class="mb-3">
            <label for="img_thumb">Ảnh đại diện:</label>
            <input type="file" name="img_thumb" class="form-control">
            <div style="width: 50px;height: 50px;">
                <img src="{{ Storage::url($product->img_thumb) }}" style="max-width: 100%; max-height: 100%;" alt="Thumbnail">
            </div>
        </div>

        <!-- Best Sale -->
        <div class="mb-3">
            <label for="is_best_sale">Best Sale:</label>
            <input type="checkbox" name="is_best_sale" class="form-check-input" {{ $product->is_best_sale ? 'checked' : '' }}>
        </div>

        <!-- 40% Sale -->
        <div class="mb-3">
            <label for="is_40_sale">40% Sale:</label>
            <input type="checkbox" name="is_40_sale" class="form-check-input" {{ $product->is_40_sale ? 'checked' : '' }}>
        </div>

        <!-- Hot Online -->
        <div class="mb-3">
            <label for="is_hot_online">Hot Online:</label>
            <input type="checkbox" name="is_hot_online" class="form-check-input" {{ $product->is_hot_online ? 'checked' : '' }}>
        </div>

        <!-- Variants -->
        <div class="mb-3">
            <label>Variants:</label>
            <div id="variants-wrapper">
                @foreach ($product->variants as $variant)
                    <div class="variant-group" data-variant-id="{{ $variant->id }}">
                        <input type="hidden" name="product_variants[{{ $variant->id }}][id]" value="{{ $variant->id }}">
                        
                        <label for="size">Size:</label>
                        <select name="product_variants[{{ $variant->id }}][size]" class="form-control">
                            @foreach ($sizes as $id => $name)
                                <option value="{{ $id }}" {{ $variant->product_size_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        
                        <label for="color">Color:</label>
                        <select name="product_variants[{{ $variant->id }}][color]" class="form-control">
                            @foreach ($colors as $id => $name)
                                <option value="{{ $id }}" {{ $variant->product_color_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="product_variants[{{ $variant->id }}][quantity]" value="{{ old('product_variants.'.$variant->id.'.quantity', $variant->quantity) }}" class="form-control">
                        
                        <label for="price">Price:</label>
                        <input type="number" name="product_variants[{{ $variant->id }}][price]" value="{{ old('product_variants.'.$variant->id.'.price', $variant->price) }}" class="form-control">

                        <label for="img_thumb">Variant img_thumb:</label>
                        <input type="file" name="product_variants[{{ $variant->id }}][img_thumb]" class="form-control">
                        
                        <div style="width: 50px; height: 50px;">
                            <img src="{{ Storage::url($variant->image) }}" style="max-width: 100%; max-height: 100%;" alt="Variant img_thumb">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Galleries -->
        <div class="mb-3">
            <label>Galleries:</label>
            <input type="file" name="product_galleries[]" multiple class="form-control">
            <div class="gallery-img_thumbs">
                @foreach ($product->galleries as $gallery)
                    <div style="width: 50px; height: 50px; display: inline-block; margin-right: 5px;">
                        <img src="{{ Storage::url($gallery->image) }}" style="max-width: 100%; max-height: 100%;" alt="Gallery img_thumb">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
    </form>
@endsection
