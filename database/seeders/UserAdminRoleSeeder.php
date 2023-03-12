<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAssociationOrganization;
use App\Models\UserCampusOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create super admin
        $super_admin = User::create([
            'name' => 'Neisya',
            'user_code' => 'sp123',
            'email' => 'neisya@ardinur.tech',
            'password' => bcrypt('12345678'),
        ]);
        $super_admin->assignRole('super-admin');

        // create admin pusat
        $admin_pusat = User::create([
            'name' => 'Admin Pusat',
            'user_code' => 'ap123',
            'email' => 'bem@ardinur.tech',
            'password' => bcrypt('12345678'),
        ]);
        $admin_pusat->assignRole('admin-pusat');

        // create admin himpunan
        $admin_himpunan = User::create([
            'name' => 'Admin Himpunan',
            'user_code' => 'ah123',
            'email' => 'himakom@ardinur.tech',
            'password' => bcrypt('12345678'),
        ]);
        $admin_himpunan->assignRole('admin-himpunan');

        // assign admin pusat to campus organization
        UserCampusOrganization::create([
            'user_id' => $admin_pusat->id,
            'campus_organization_code' => 'BEM',
            'position' => 'Ketua',
        ]);

        // assign admin himpunan to faculty organization
        UserAssociationOrganization::create([
            'user_id' => $admin_himpunan->id,
            'faculty_organization_code' => 'HIMAKOM',
            'position' => 'Ketua',
        ]);
    }
}
