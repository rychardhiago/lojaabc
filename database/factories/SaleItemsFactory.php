<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class SaleItemsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sales_id' => fake()->numerify(),
            'product_id' => fake()->numerify(),
            'name' => fake()->name(),
            'price' => fake()->numerify(),
            'amount' => fake()->numerify(),
        ];
    }
}
