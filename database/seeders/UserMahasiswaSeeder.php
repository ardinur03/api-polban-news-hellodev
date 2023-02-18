<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = User::create([
            'name' => 'Muhamad Ardi Nur Insan',
            'user_code' => '211511022',
            'email' => 'me@ardinur.tech',
            'password' => bcrypt('12345678'),
        ]);

        $mahasiswa->assignRole('mahasiswa');

        // assign mahasiswa to student
        $mahasiswa->student()->create([
            'study_program_id' => 1,
            'user_id' => $mahasiswa->id,
            'cohort_year' => 2021,
            'address' => 'Jalan bandung lautan api',
            'phone_number' => '+62895328885809',
            'created_at' => now(),
        ]);
    }
}
