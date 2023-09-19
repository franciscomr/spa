<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Catalog\OrganizationController;
use App\Http\Controllers\Catalog\BranchController;
use App\Http\Controllers\Utils\SelectController;
use App\Http\Controllers\Catalog\DepartmentController;
use App\Http\Controllers\Catalog\PositionController;
use App\Http\Controllers\Catalog\EmployeeController;
use App\Http\Controllers\Catalog\CategoryController;
use App\Http\Controllers\Catalog\BrandController;
use App\Http\Controllers\Catalog\EquipmentController;
use App\Http\Controllers\Catalog\EquipmentModelController;
use App\Http\Controllers\Catalog\PhonePlanController;
use App\Http\Controllers\Catalog\ContractController;

use App\Http\Controllers\AssetManagement\AssetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->name('get.user');;

Route::controller(LoginController::class)->group(function () {
    route::post('login', 'login')->name('login');
    route::post('logout', 'logout')->name('logout');
});

Route::controller(OrganizationController::class)->group(function () {
    route::get('organizations', 'index')->name('organizations.index');
    route::post('organizations', 'store')->name('organizations.store');
    route::get('organizations/export', 'export')->name('organizations.export');
    route::get('organizations/{id}', 'show')->name('organizations.show');
    route::patch('organizations/{organization}', 'update')->name('organizations.update');
});


Route::controller(BranchController::class)->group(function () {
    route::get('branches', 'index')->name('branches.index');
    route::post('branches', 'store')->name('branches.store');
    route::get('branches/export', 'export')->name('branches.export');
    route::get('branches/{id}', 'show')->name('branches.show');
    route::patch('branches/{branch}', 'update')->name('branches.update');
});

Route::controller(DepartmentController::class)->group(function () {
    route::get('departments', 'index')->name('departments.index');
    route::post('departments', 'store')->name('departments.store');
    route::get('departments/export', 'export')->name('departments.export');
    route::get('departments/{id}', 'show')->name('departments.show');
    route::patch('departments/{department}', 'update')->name('departments.update');
});

Route::controller(PositionController::class)->group(function () {
    route::get('positions', 'index')->name('positions.index');
    route::post('positions', 'store')->name('positions.store');
    route::get('positions/export', 'export')->name('positions.export');
    route::get('positions/{id}', 'show')->name('positions.show');
    route::patch('positions/{position}', 'update')->name('positions.update');
});

Route::controller(EmployeeController::class)->group(function () {
    route::get('employees', 'index')->name('employees.index');
    route::post('employees', 'store')->name('employees.store');
    route::get('employees/export', 'export')->name('employees.export');
    route::get('employees/{id}', 'show')->name('employees.show');
    route::patch('employees/{employee}', 'update')->name('employees.update');
});

Route::controller(CategoryController::class)->group(function () {
    route::get('categories', 'index')->name('categories.index');
    route::post('categories', 'store')->name('categories.store');
    route::get('categories/export', 'export')->name('categories.export');
    route::get('categories/{id}', 'show')->name('categories.show');
    route::patch('categories/{category}', 'update')->name('categories.update');
});

Route::controller(BrandController::class)->group(function () {
    route::get('brands', 'index')->name('brands.index');
    route::post('brands', 'store')->name('brands.store');
    route::get('brands/export', 'export')->name('brands.export');
    route::get('brands/{id}', 'show')->name('brands.show');
    route::patch('brands/{brand}', 'update')->name('brands.update');
});

Route::controller(EquipmentController::class)->group(function () {
    route::get('equipment', 'index')->name('equipment.index');
    route::post('equipment', 'store')->name('equipment.store');
    route::get('equipment/export', 'export')->name('equipment.export');
    route::get('equipment/{id}', 'show')->name('equipment.show');
    route::patch('equipment/{equipment}', 'update')->name('equipment.update');
});

Route::controller(EquipmentModelController::class)->group(function () {
    route::get('equipmentModels', 'index')->name('equipmentModels.index');
    route::post('equipmentModels', 'store')->name('equipmentModels.store');
    route::get('equipmentModels/export', 'export')->name('equipmentModels.export');
    route::get('equipmentModels/{id}', 'show')->name('equipmentModels.show');
    route::patch('equipmentModels/{equipmentModel}', 'update')->name('equipmentModels.update');
    route::post('equipmentModels/attach/{id}', 'attach')->name('equipmentModels.attach');
});


Route::controller(PhonePlanController::class)->group(function () {
    route::get('phonePlans', 'index')->name('phonePlans.index');
    route::post('phonePlans', 'store')->name('phonePlans.store');
    route::get('phonePlans/export', 'export')->name('phonePlans.export');
    route::get('phonePlans/{id}', 'show')->name('phonePlans.show');
    route::patch('phonePlans/{phonePlan}', 'update')->name('phonePlans.update');
});

Route::controller(ContractController::class)->group(function () {
    route::get('contracts', 'index')->name('contracts.index');
    route::post('contracts', 'store')->name('contracts.store');
    route::get('contracts/export', 'export')->name('contracts.export');
    route::get('contracts/{id}', 'show')->name('contracts.show');
    route::patch('contracts/{contract}', 'update')->name('contracts.update');
});

Route::controller(AssetController::class)->group(function () {
    route::get('assets', 'index')->name('assets.index');
    route::post('assets', 'store')->name('assets.store');
    route::get('assets/export', 'export')->name('assets.export');
    route::get('assets/{id}', 'show')->name('assets.show');
    route::patch('assets/{asset}', 'update')->name('assets.update');
});

Route::controller(SelectController::class)->group(function () {
    route::get('select', 'select')->name('select');
});
