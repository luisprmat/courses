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
            'name' => 'courses:show',
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

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        $admin->givePermissionTo(Permission::all());
    }
}
