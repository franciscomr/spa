<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\ContractType;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContractType::create(
            [
                'name' => 'CompraVenta',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        ContractType::create(
            [
                'name' => 'Arrendamiento',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        ContractType::create(
            [
                'name' => 'Prestacion de Servicios',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
