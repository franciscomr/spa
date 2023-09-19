<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\PhoneCompany;

class PhoneCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhoneCompany::create(
            [
                'name' => 'AT&T',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        PhoneCompany::create(
            [
                'name' => 'Movistar',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        PhoneCompany::create(
            [
                'name' => 'Telcel',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
