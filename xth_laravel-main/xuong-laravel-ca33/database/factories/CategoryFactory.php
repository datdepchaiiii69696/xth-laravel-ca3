<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'cover' => 'https://routine.vn/media/amasty/webp/catalog/product/cache/5de180fdba0e830d350bd2803a0413e8/a/o/ao-so-mi-nam-dai-tay-02-10s24shl003_blue-stripe-_1__2_jpg.webp',
        ];
    }
}
