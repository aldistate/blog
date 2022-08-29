<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 6)),
            'slug' => $this->faker->slug(3),
            'excerpt' => $this->faker->paragraph(4),
            'body' => collect($this->faker->paragraphs(mt_rand(2, 6)))
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode(''),
            'user_id' => mt_rand(1,6),
            'category_id' => mt_rand(1,3),
        ];
    }
}
