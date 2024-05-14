<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_id' => mt_rand(1, 100),
            'user_id' => mt_rand(1, 6),
            'body' => collect($this->faker->paragraphs(mt_rand(1, 2)))->map(fn($p) => "<p>$p</p>")->implode('')
        ];
    }
}
