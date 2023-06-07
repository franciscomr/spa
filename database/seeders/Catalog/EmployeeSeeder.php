<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create(
            [
                'branch_id' => 4,
                'position_id' => 23,
                'employeeId' => 'E03583',
                'name' => 'Francisco',
                'firstSurname' => 'Martinez',
                'secondSurname' => 'Ramirez',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Employee::create(
            [
                'branch_id' => 2,
                'position_id' => 23,
                'employeeId' => 'E04460',
                'name' => 'Marco Antonio',
                'firstSurname' => 'Panales',
                'secondSurname' => 'NUñez',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
