<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Catalog\OrganizationController;

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
