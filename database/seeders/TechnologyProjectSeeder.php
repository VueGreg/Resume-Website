<?php

namespace Database\Seeders;

use App\Models\technology_project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        technology_project::factory(100)->create();
    }
}
