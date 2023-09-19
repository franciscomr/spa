<?php

namespace Database\Seeders\AssetManagement;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssetManagement\AssetCondition;

class AssetConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssetCondition::create([
            'name' => 'Buenas condiciones',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetCondition::create([
            'name' => 'Regulares condiciones',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetCondition::create([
            'name' => 'Malas condiciones',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);
    }
}
