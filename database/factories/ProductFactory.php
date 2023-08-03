<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = Str::slug($category_name);
        return [
            //
            'name' => $category_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'sale_price' => $this->faker->numberBetween(10, 500),
            'SKU' => $this->faker->numberBetween(100, 500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100, 200),
            'image' => 'product_'.$this->faker->unique()->numberBetween(1, 16),
            'category_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}
