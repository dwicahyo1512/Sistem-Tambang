<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
        Permission::create(['name' => 'create admin']);
        Permission::create(['name' => 'read admin']);
        Permission::create(['name' => 'update admin']);
        Permission::create(['name' => 'delete admin']);
        //aggre
        Permission::create(['name' => 'create pool']);
        Permission::create(['name' => 'read pool']);
        Permission::create(['name' => 'update pool']);
        Permission::create(['name' => 'delete pool']);

        Permission::create(['name' => 'read dashboard']);
        Permission::create(['name' => 'read client_users']);
        // create roles and assign created permissions

        // this can be done as separate statements

        $role = Role::create(['name' => 'client-users']);
        $role->givePermissionTo([
            'read client_users',
        ]);

        $role = Role::create(['name' => 'pool']);
        $role->givePermissionTo([
            'read client_users',
            'read pool',
            'create pool',
            'update pool',
            'delete pool',
        ]);


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
