<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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
        return [
 
            'description'=>fake()->sentence($nbWords = 6, $variableNbWords = true),
            'quantity'=>fake()->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
            'price'=>fake()->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt')
        ];
    }
}
