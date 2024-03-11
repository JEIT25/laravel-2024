<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "description" => fake()->sentence(),
            "long_description" => fake()->paragraph(7, true),
            "completed" => fake()->boolean,
        ];
    }

    public function uncompleted(): static
    {
        return $this->state(fn (array $attributes) => [
            "completed" => true,
        ]);
    }
}
