<?php

namespace Database\Factories;

use App\Models\business;
use Illuminate\Support\Str;
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

        $title = fake()->sentence(2);
        $slug = Str::slug($title);

        return [
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'job' => fake()->word(),
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->text(300),
            'isTraining' => fake()->boolean(),
            'id_business' => function () {
                return business::inRandomOrder()->first()->id;
            },
        ];
    }
}
