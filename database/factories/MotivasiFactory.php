<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MotivasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'isi' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
