<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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

        // create permissions
        Permission::create(['name' => 'akses super admin']);
        Permission::create(['name' => 'akses admin pusat']);
        Permission::create(['name' => 'akses admin himpunan']);
        Permission::create(['name' => 'akses mahasiswa']);

        // this can be done as separate statements
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo('akses super admin');

        $role = Role::create(['name' => 'admin-pusat']);
        $role->givePermissionTo('akses admin pusat');

        $role = Role::create(['name' => 'admin-himpunan']);
        $role->givePermissionTo('akses admin himpunan');

        $role = Role::create(['name' => 'mahasiswa']);
        $role->givePermissionTo('akses mahasiswa');
    }
}
