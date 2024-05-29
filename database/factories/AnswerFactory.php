<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer' => $this->faker->sentence,
            'is_correct' => false, // Default to false, will set correct one in Question factory
        ];
    }
}
