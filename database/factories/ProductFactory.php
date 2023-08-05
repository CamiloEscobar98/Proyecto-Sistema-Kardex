<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = "Producto {$this->faker->randomLetter()} {$this->faker->words(3, true)}";
        $description = $this->faker->realText;
        $price = $this->faker->randomFloat(2, 0, 100);
        $stock = $this->faker->randomNumber(3);
        return compact('name', 'description', 'price', 'stock');
    }
}
