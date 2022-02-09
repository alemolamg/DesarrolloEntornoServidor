<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FruitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_fruta' => $this->faker->safeColorName(),
            'temporada' => $this->faker->randomNumber(2),
            'pais' => $this->faker->country()
        ];
    }
}
