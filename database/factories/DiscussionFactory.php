<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiscussionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'user_id' => mt_rand(1, 6),
            'slug' => $this->faker->slug(),
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
            // 'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function($p) {
            //     return "<p>$p</p>";
            // })->implode(''),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode('')
        ];
    }
}
