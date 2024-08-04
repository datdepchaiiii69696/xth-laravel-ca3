<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(ProductSize::class)->constrained();
            $table->foreignIdFor(ProductColor::class)->constrained();
            $table->string('image')->nullable();
            $table->integer('quantity')->default(0);
            $table->float('price');
            $table->timestamps();

            $table->unique(['product_id', 'product_size_id', 'product_color_id'], 'product_variant_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
