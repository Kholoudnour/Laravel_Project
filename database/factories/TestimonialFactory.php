<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Emily', 'Johnathan', 'Kurtis']),
            'content' => fake()->randomElement(['Software Engineer', 'Product Manager', 'Wordpress Developer']),
            'description' => fake()->text(),
            'pub' => fake()->numberBetween(0, 1),
            #'image' => basename(fake()->image(public_path('assets/img/admins'))),
            'image' => $this->generateRandomImage(public_path('assets/img/admins/testimonials/')),
        ];
    }
}
