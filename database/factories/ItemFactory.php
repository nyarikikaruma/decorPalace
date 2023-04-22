<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = 'decor3.jpg';

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'image' =>$image,
            'instock' => true
        ];
    }
}
