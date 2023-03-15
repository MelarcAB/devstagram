<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(5),
            "description" => $this->faker->paragraph(1),
            "image" => $this->faker->uuid() . '.jpg',
            "user_id" => $this->faker->randomElement([10, 8]),

        ];
    }
}
