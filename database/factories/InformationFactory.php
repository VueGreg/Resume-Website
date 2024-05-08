<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'WOLFF',
            'surname' => 'Grégory',
            'adress' => '59 rue Principale',
            'postal_code' => '57330',
            'city' => 'ZOUFFTGEN',
            'country' => 'FRANCE',
            'phone' => '0621370727',
            'email' => 'gregory.wolff.dev@gmail.com',
            'driving_license' => true,
            'vehicle' => true,
            'password' => Hash::make('Maintenance@57100'),
        ];
    }
}
