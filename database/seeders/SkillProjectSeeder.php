<?php

namespace Database\Seeders;

use App\Models\skill_project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        skill_project::factory(300)->create();
    }
}
