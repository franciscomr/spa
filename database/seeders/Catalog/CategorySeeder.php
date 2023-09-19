<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(
            [
                'name' => 'Cómputo',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Category::create(
            [
                'name' => 'Telefonia',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Category::create(
            [
                'name' => 'Comunicaciones',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Category::create(
            [
                'name' => 'CCTV',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );

        Category::create(
            [
                'name' => 'Utileria',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
