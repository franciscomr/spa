<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'employee_id' => 1,
            'name' => 'Francisco Martinez',
            'username' => 'francisco.martinez',
            'email' => 'francisco.martinez@sagaji.com.mx',
            'password' => bcrypt('Sagaji01'),
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);

        User::create([
            'employee_id' => 2,
            'name' => 'Marco Panales',
            'username' => 'marco.panales',
            'email' => 'marco.panales@sagaji.com.mx',
            'password' => bcrypt('Sagaji01'),
            'createdBy' => 'Administrador',
            'updatedBy' => 'Administrador',
        ]);
    }
}
