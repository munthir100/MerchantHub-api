<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'cost' => $this->faker->randomFloat(2, 5, 50),
            'sku' => $this->faker->unique()->ean13,
            'quantity' => $this->faker->numberBetween(1, 100),
            'is_unlimited' => $this->faker->boolean,
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'is_discounted' => $this->faker->boolean,
            'price_after_discount' => $this->faker->randomFloat(2, 5, 90),
            'shortcut_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
}
