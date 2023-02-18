<?php

namespace Database\Seeders;

use App\Models\CampusOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_campus_organization = [
            [
                'code_campus_organization' => 'BEM',
                'name_campus_organization' => 'Badan Eksekutif Mahasiswa'
            ],
            [
                'code_campus_organization' => 'ULT',
                'name_campus_organization' => 'Unit Layanan Terpadu'
            ]
        ];

        foreach ($data_campus_organization as $data) {
            CampusOrganization::create($data);
        }
    }
}
