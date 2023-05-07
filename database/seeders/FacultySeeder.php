<?php

namespace Database\Seeders;

use App\Models\faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculty = [
            [
                'faculty_name' => 'Teknik Komputer dan Informatika',
            ],
            [
                'faculty_name' => 'Teknik Kimia',
            ],
            [
                'faculty_name' => 'Teknik Elektro',
            ],
            [
                'faculty_name' => 'Hello Dev Code Faculty',
            ],
            [
                'faculty_name' => 'Teknik Sipil',
            ],
            [
                'faculty_name' => 'Teknik Mesin',
            ],
            [
                'faculty_name' => 'Teknik Konversi Energi'
            ],
            [
                'faculty_name' => 'Administrasi Niaga'
            ]

        ];

        foreach ($faculty as $data) {
            faculty::create($data);
        }
    }
}
