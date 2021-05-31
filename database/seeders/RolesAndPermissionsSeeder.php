<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create([
            'name' => 'courses:create',
            'display_name' => 'Crear Cursos'
        ]);

        Permission::create([
            'name' => 'courses:view',
            'display_name' => 'Ver Cursos'
        ]);

        Permission::create([
            'name' => 'courses:update',
            'display_name' => 'Actualizar Cursos'
        ]);

        Permission::create([
            'name' => 'courses:destroy',
            'display_name' => 'Eliminar Cursos'
        ]);

        Permission::create([
            'name' => 'roles:create',
            'display_name' => 'Crear Roles'
        ]);

        Permission::create([
            'name' => 'roles:view',
            'display_name' => 'Ver Roles'
        ]);

        Permission::create([
            'name' => 'roles:update',
            'display_name' => 'Actualizar Roles'
        ]);

        Permission::create([
            'name' => 'roles:destroy',
            'display_name' => 'Eliminar Roles'
        ]);

        Permission::create([
            'name' => 'users:view',
            'display_name' => 'Ver Usuarios'
        ]);

        Permission::create([
            'name' => 'users:update',
            'display_name' => 'Editar Usuarios'
        ]);

        Permission::create([
            'name' => 'view-dashboard',
            'display_name' => 'Ver Panel'
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        $admin->givePermissionTo(Permission::all());

        $instructor = Role::create([
            'name' => 'instructor',
            'display_name' => 'Instructor'
        ]);

        $instructor->syncPermissions([
            'courses:create',
            'courses:view',
            'courses:update',
            'courses:destroy'
        ]);
    }
}
