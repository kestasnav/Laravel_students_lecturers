<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'course_id'=> fake()->numberBetween(1, 15),
            'start'=> fake()->date(),
            'end'=> fake()->date(),
            'lecturer_id'=>fake()->numberBetween(1, 3)
        ];
    }
}
