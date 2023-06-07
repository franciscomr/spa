<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create([
            'name' => 'SAGAJI',
            'businessName' => 'Distribuciones SAGAJI SA de CV',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postalCode' => '04950',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);

        Organization::create([
            'name' => 'REGION MIXTECA',
            'businessName' => 'Region Mixteca Tierra del Sol S.A. DE C.V',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postalCode' => '04950',
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador'
        ]);
    }
}
