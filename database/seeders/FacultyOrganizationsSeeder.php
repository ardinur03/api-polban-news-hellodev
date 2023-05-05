<?php

namespace Database\Seeders;

use App\Models\FacultyOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultyOrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_faculty_organization = [
            [
                'code_faculty_organization' => 'HIMAKOM',
                'name_faculty_organization' => 'Himpunan Mahasiswa Teknik Komputer dan Informatika',
                'faculty_id' => 1
            ],
            [
                'code_faculty_organization' => 'HMJTK',
                'name_faculty_organization' => 'Himpunan Mahasiswa Teknik Kimia',
                'faculty_id' => 2
            ],
            [
                'code_faculty_organization' => 'HDC',
                'name_faculty_organization' => 'Hello Dev Code Himpunan',
                'faculty_id' => 4
            ]
        ];

        foreach ($data_faculty_organization as $data) {
            FacultyOrganization::create($data);
        }
    }
}
