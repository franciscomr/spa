<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Contract;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contract::create(
            [
                'contract_type_id' => 1,
                'billNumber' => 'AF0001',
                'name' => 'Activo Fijo',
                'vendor' => 'SAGAJI',
                'billDate' => '1990-12-10',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
