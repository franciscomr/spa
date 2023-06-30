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

Route::controller(SelectController::class)->group(function () {
    route::get('select', 'select')->name('select');
});
