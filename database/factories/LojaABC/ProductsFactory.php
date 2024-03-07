<?php

namespace Database\Factories\LojaABC;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LojaABC\Products>
 */
class ProductsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numerify(),
            'name' => fake()->name(),
            'price' => fake()->numerify(),
            'description' => fake()->name()
        ];
    }
}
