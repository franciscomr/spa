<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\EquipmentModel;

class EquipmentModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EquipmentModel::create(
            [
                'equipment_id' => 27,
                'brand_id' => 31,
                'name' => 'Latitude 3420',
                'attributes' => 'Procesador: Inter Core i11 7700 RAM: 16GB',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        EquipmentModel::create(
            [
                'equipment_id' => 13,
                'brand_id' => 31,
                'name' => 'OptiPlex 3080 Micro',
                'attributes' => 'Procesador: Inter Core i11 7700 RAM: 16GB',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        EquipmentModel::create(
            [
                'equipment_id' => 32,
                'brand_id' => 31,
                'name' => 'E220H',
                'attributes' => 'Resolución: 1080x720p',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        EquipmentModel::create(
            [
                'equipment_id' => 50,
                'brand_id' => 31,
                'name' => 'KB216t',
                'attributes' => 'Mouse USB Negro',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        EquipmentModel::create(
            [
                'equipment_id' => 34,
                'brand_id' => 31,
                'name' => 'INTERNET 350U',
                'attributes' => 'No Break',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        EquipmentModel::create(
            [
                'equipment_id' => 50,
                'brand_id' => 31,
                'name' => 'MS3320W',
                'attributes' => 'Mouse Inalámbrico Negro',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        EquipmentModel::create(
            [
                'equipment_id' => 4,
                'brand_id' => 31,
                'name' => 'ESBP1520',
                'attributes' => 'BagPack Dell',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
