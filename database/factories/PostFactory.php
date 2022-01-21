<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'url' => Str::slug($title),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'published_at' => now(),
            'category_id' => rand(1,7)
        ];
    }
}
