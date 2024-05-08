<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'created_date' => fake()->date(),
            'url_image' => fake()->imageUrl(),
            'alt_image' => fake()->text(100),
            'github' => fake()->url(),
            'url_website' => fake()->url(),
        ];
    }
}
