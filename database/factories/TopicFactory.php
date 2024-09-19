<?php

namespace Database\Factories;
use App\Models\Category;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Software', 'Backend', 'Laravel', 'Java Script']),
            'category_id'  => fake()->numberBetween(1, 2, 3, 4),
            'category' => fake()->randomElement(['Computer Science', 'Prograamming', 'Cloud Engineering', 'Database']),
            'content' =>   fake()->text(),
            'trending' => true,
            'published' => true,
            // 'image' => basename(fake()->image()),
        ];
    }
}
