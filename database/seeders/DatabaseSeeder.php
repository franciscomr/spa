<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Catalog\OrganizationSeeder;
use Database\Seeders\Catalog\BranchSeeder;
use Database\Seeders\Catalog\DepartmentSeeder;
use Database\Seeders\Catalog\PositionSeeder;
use Database\Seeders\Catalog\EmployeeSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            OrganizationSeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class
        ]);
    }
}
