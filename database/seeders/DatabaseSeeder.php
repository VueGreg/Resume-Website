<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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
            CategorySeeder::class,
            TechnologySeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            TypeModelSeeder::class,
            ProjectSeeder::class,
            SkillProjectSeeder::class,
            TechnologyProjectSeeder::class,
            InterestSeeder::class,
        ]);
    }
}
