<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        ProductGallery::query()->truncate();
        ProductVariant::query()->truncate();
        Product::query()->truncate();

        // PRODUCT SIZE
        // S, M, L , XL, 2XL
        foreach (['S', 'M', 'L' , 'XL', '2XL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }

        //PRODUCT COLOR
        foreach (['black', 'blue', 'white', 'gray', 'yellow'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }

        // PRODUCT
        for ($i = 0; $i < 100; $i++) {
            $name = fake()->text(25);
            $sku = Str::random(8);
            Product::query()->create([
                'category_id' => rand(11, 14),
                'name' => $name,
                'slug'=> Str::slug($name).'-'.$sku,
                'sku' => $sku,
                'img_thumb' => 'https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F17204967424087171.jpg&w=2048&q=75',
                'price' => 100000,
                'price_sale'=>69000,
                'material' => fake()->text(100),
                'description'=> fake()->text(100),
                'use_manual'=> fake()->text(100),
            ]);
        }


        //PRODUCT GALLERY
        for ($i = 1; $i< 101; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id'=> $i,
                    'image' => 'https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F17162834066359664.jpg&w=2048&q=75'
                ],
                [
                    'product_id'=> $i,
                    'image' => 'https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F17129070924941246.jpg&w=2048&q=75'
                ],
                [
                    'product_id'=> $i,
                    'image' => 'https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F17150641730043275.jpg&w=2048&q=75'
                ]
            ]);
        }
    }
}
