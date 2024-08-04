<?php

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductVariant::class)->constrained();
            $table->foreignIdFor(Order::class)->constrained();

            // Sao lưu thông tin sản phẩm và biến thể sản phaarm
            $table->string('product_name');
            $table->string('product_sku');
            $table->string('product_img_thumb');
            $table->string('product_price');
            $table->string('product_price_sale');

            $table->string('variant_size_name');
            $table->string('variant_color_name');
            $table->string('quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
