<?php

namespace Database\Factories;

use App\Models\skill;
use App\Models\project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\skill_project>
 */
class skill_projectFactory extends Factory
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
            'id_skill' => function () {
                return skill::inRandomOrder()->first()->id;
            },
        ];
    }
}
