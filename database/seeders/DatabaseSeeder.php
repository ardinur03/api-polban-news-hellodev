<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolesAndPermissionsSeeder::class,
            CampusOrganizationSeeder::class,
            FacultySeeder::class,
            FacultyOrganizationsSeeder::class,
            StudyProgramSeeder::class,
            UserAdminRoleSeeder::class,
            UserMahasiswaSeeder::class,
            CategorySeeder::class,
        ]);
        \App\Models\StudentCenterNew::factory(500)->create();
    }
}
