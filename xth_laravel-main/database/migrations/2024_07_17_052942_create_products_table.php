<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('img_thumb')->nullable();
            $table->string('price');
            $table->string('price_sale')->nullable();
            $table->string('material')->nullable();
            $table->string('description')->nullable();
            $table->string('use_manual')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_best_sale')->default(false);
            $table->boolean('is_40_sale')->default(false);
            $table->boolean('is_hot_online')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
