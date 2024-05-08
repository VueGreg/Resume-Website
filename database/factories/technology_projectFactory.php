<?php

namespace Database\Factories;

use App\Models\project;
use App\Models\technology;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\technology_project>
 */
class technology_projectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_project' => function () {
                return project::inRandomOrder()->first()->id;
            },
            'id_technology' => function () {
                return technology::inRandomOrder()->first()->id;
            },
        ];
    }
}
