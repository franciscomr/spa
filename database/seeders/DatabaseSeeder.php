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
use Database\Seeders\Catalog\CategorySeeder;
use Database\Seeders\Catalog\BrandSeeder;
use Database\Seeders\Catalog\EquipmentSeeder;
use Database\Seeders\Catalog\EquipmentModelSeeder;
use Database\Seeders\Catalog\PhoneCompanySeeder;
use Database\Seeders\Catalog\PhonePlanSeeder;
use Database\Seeders\Catalog\ContractTypeSeeder;
use Database\Seeders\Catalog\ContactSeeder;
use Database\Seeders\AssetManagement\AssetConditionSeeder;
use Database\Seeders\AssetManagement\AssetDisposalReasonSeeder;
use Database\Seeders\AssetManagement\AssetSeeder;

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
            CategorySeeder::class,
            BrandSeeder::class,
            EquipmentSeeder::class,
            EquipmentModelSeeder::class,
            UserSeeder::class,
            PhoneCompanySeeder::class,
            PhonePlanSeeder::class,
            ContractTypeSeeder::class,
            ContactSeeder::class,
            AssetConditionSeeder::class,
            AssetDisposalReasonSeeder::class,
            AssetSeeder::class
        ]);
    }
}
