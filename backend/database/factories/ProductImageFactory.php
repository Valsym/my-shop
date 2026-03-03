<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => rand(3, 19),
            'image_url' => 'https://source.unsplash.com/random/200x267?sig=' . rand(1, 10000),
        ];
    }

}
