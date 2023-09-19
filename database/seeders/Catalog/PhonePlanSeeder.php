<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\PhonePlan;

class PhonePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhonePlan::create(
            [
                'phone_company_id' => 3,
                'name' => 'TM SL EMP 1000 CONTROL',
                'data' => '8',
                'startDate' => '2022-05-01',
                'expirationDate' => '2024-02-01',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
