<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function detail($slug) {
        $product = Product::query()->where('slug', $slug)
            ->with(['category', 'galleries', 'variants'])->first();
        $product_variants = $product->variants->all();
        $colorIds = [];
        $sizeIds = [];
        foreach ($product_variants as $item) {
            $colorIds[] = $item->product_size_id;
            $sizeIds[] = $item->product_color_id;
        }
        $colors = ProductColor::query()->whereIn('id', $colorIds)->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->whereIn('id', $sizeIds)->pluck('name', 'id')->all();

        return view('product-detail', compact('product', 'colors', 'sizes'));
    }
}
