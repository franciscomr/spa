<?php

namespace Database\Seeders\AssetManagement;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssetManagement\AssetDisposalReason;

class AssetDisposalReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssetDisposalReason::create([
            'name' => 'Equipo en inventario',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetDisposalReason::create([
            'name' => 'Desecho (Equipo Obsoleto)',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetDisposalReason::create([
            'name' => 'Extravio o Robo',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetDisposalReason::create([
            'name' => 'Reemplazo por Garantia',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetDisposalReason::create([
            'name' => 'Vencimiento de contrato (Regreso a Proveedor)',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        AssetDisposalReason::create([
            'name' => 'Venta de Equipo',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);
    }
}
