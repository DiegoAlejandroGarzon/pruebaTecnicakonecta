<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class roles_permisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'crearCliente']);
        Permission::create(['name' => 'editarCliente']);
        Permission::create(['name' => 'eliminarCliente']);
        Permission::create(['name' => 'crearUsuario']);
        Permission::create(['name' => 'editarUsuario']);
        Permission::create(['name' => 'eliminarUsuario']);

        
        $role = Role::create(['name' => 'administrador']);
        $role->givePermissionTo('crearCliente');
        $role->givePermissionTo('editarCliente');
        $role->givePermissionTo('eliminarCliente');
        $role->givePermissionTo('crearUsuario');
        $role->givePermissionTo('editarUsuario');
        $role->givePermissionTo('eliminarUsuario');
        
        $role = Role::create(['name' => 'vendedor']);
        $role->givePermissionTo('crearCliente');
        $role->givePermissionTo('editarCliente');
        $role->givePermissionTo('eliminarCliente');
    }
}
