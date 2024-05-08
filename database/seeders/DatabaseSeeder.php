<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            InformationSeeder::class,
            BusinessSeeder::class,
            TechnologySeeder::class,
            SkillSeeder::class,
            ProjectSeeder::class,
            ExperienceSeeder::class,
            SkillProjectSeeder::class,
            TechnologyProjectSeeder::class,
            InterestSeeder::class,
        ]);
    }
}
