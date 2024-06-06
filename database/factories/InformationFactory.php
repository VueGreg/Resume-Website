<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
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
            'birthday' => Carbon::createFromFormat('Y-m-d', '1988-08-17'),
            'driving_license' => true,
            'vehicle' => true,
            'password' => Hash::make('Maintenance@57100'),
            'description' => 'Ancien Chargé d’Affaire dans la Climatisation en dernier poste chez KUTHE SAS à METZ.
                                Afin de réussir ma reconversion, je suis à la recherche d’une entreprise dans le but de réaliser une
                                alternance d’un an, à partir de septembre pour effectuer la formation Bachelor Développeur Full
                                Stack',
            'linkedin' => 'https://www.linkedin.com/in/gregory-wolff-81b798290',
            'github' => 'https://github.com/VueGreg',
            'tokenAPI' => 'D8gYd4Fe15cKAYW9gtEZvD4MUxwlpjYHK3HLH7pS9V5DsVbKto9q3PGYzT7zAo1g' //token de test
        ];
    }
}
