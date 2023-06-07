<?php

namespace Database\Seeders\Catalog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(
            [
                'name' => 'Administracion de Inventarios',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Administracion y Finanzas',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Almacen',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Archivo',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Auditoria Interna',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Capital Humano',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Centro de Soluciones',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Cielo Mixteco',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Compras',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Contabilidad',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Contraloria Cedis',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Credito y Cobranza',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Cuentas por Pagar',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Direccion General',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Informacion Comercial',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Ingenieria de Producto',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Juridico',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Limpieza',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Logistica y Distribucion',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Mantenimiento',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Mercadotecnia',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Seguridad Patrimonial',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Soporte Técnico y Desarrollo',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Telemarketing',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Tesoreria',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Union',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
        Department::create(
            [
                'name' => 'Ventas',
                'createdBy' => 'Administrador',
                'updatedBy' => 'Administrador',
            ]
        );
    }
}
