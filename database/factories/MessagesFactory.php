<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Messages>
 */
class MessagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'subject' => fake()->title(),
            'body' =>  fake()->text(),
            'is_read' => fake()->numberBetween(0, 1),
            ];
    }
}
