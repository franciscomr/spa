<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Access Point',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Aire Acondicionado',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Bafle',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'BagPack',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Banco de Baterias',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Bocina',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Cámara Fotográfica',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Camara',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Cargador',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Cargador de Pilas AAA',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '2',
                'name' => 'Celular',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Conmutador',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'CPU',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Diadema',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Disco Duro Externo',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '4',
                'name' => 'DVR',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Escaner',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Firewall',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '4',
                'name' => 'Fuente de Alimentación',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'GateWay IP',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Hand Held',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'HUB',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Impresora',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Impresora de Etiquetas',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Impresora de Tickets',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Impresora Termica',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Laptop',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Lector de Código de Barras',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Lector de Disco Duro Externo',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Micrófono',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Módem',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Monitor',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Mouse',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'No Break',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'NTU',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '4',
                'name' => 'NVR',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Pantalla Plana',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Proyector',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Quemador de CD',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Quemador de DVD',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Regulador',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Repoductor DVD',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Router',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Servidor de Impresión',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Sopladora',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Soporte - Brazo para monitor',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Switch',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '2',
                'name' => 'Tableta',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Tarjeta Telefónica E1',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'Teclado',
                'isAssignable' => 1,
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Teléfono Analógico',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Teléfono IP',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Equipment::create(
            [
                'category_id' => '5',
                'name' => 'Televisión',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '3',
                'name' => 'Terminal Portail',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Equipment::create(
            [
                'category_id' => '1',
                'name' => 'UPS',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
