<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Definir la lista como un array simple de strings
        $permissions = [
            'admin.services.index',
            'admin.services.create',
            'admin.services.edit',
            'admin.services.delete',
            'admin.appointments.index',
            'admin.appointments.create',
            'admin.appointments.edit',
            'admin.appointments.delete',
            'admin.appointments.validate',
            'admin.comments.index',
            'admin.comments.validate',
            'admin.comments.delete',
            'admin.employees.index',
            'admin.employees.create',
            'admin.employees.edit',
            'admin.employees.delete',
            'admin.employees.permission',
            'admin.clients.index',
            'admin.clients.create',
            'admin.clients.edit',
            'admin.clients.delete',
            'admin.permissions.index',
            'admin.roles.index',
            'admin.roles.create',
            'admin.roles.edit',
            'admin.roles.delete',
        ];

        // 2. Crear los permisos (iteración corregida)
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // 3. Crear Super-Admin y asignar TODO
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $allPermissions = Permission::all();
        $roleSuperAdmin->syncPermissions($allPermissions);

        // 4. Crear Admin y asignar específicos
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->syncPermissions([
            'admin.appointments.index',
            'admin.appointments.create',
            'admin.appointments.edit',
            'admin.appointments.validate',
            'admin.comments.index',
            'admin.comments.validate',
            'admin.comments.delete',
            'admin.clients.index',
            'admin.clients.create',
            'admin.clients.edit',
            'admin.clients.delete',
        ]);
    }
}
