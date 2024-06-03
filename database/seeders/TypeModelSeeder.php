<?php

namespace Database\Seeders;

use App\Models\TypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeModel::create([
            'name' => 'FRONT-END'
        ]);

        TypeModel::create([
            'name' => 'BACK-END'
        ]);

        TypeModel::create([
            'name' => 'FULL-STACK'
        ]);

        TypeModel::create([
            'name' => 'AUTRES'
        ]);
    }
}
