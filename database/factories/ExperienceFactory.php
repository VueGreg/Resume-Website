<?php

namespace Database\Factories;

use App\Models\business;
use App\Models\project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'job' => fake()->word(),
            'title' => fake()->sentence(2),
            'isTraining' => fake()->boolean(),
            'id_project' => function () {
                return project::inRandomOrder()->first()->id;
            },
            'id_business' => function () {
                return business::inRandomOrder()->first()->id;
            },
        ];
    }
}
