<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_category = [
            [
                'category_name' => 'Kegiatan Mahasiswa'
            ],
            [
                'category_name' => 'Kegiatan Dosen'
            ],
            [
                'category_name' => 'Kegiatan Umum'
            ],
            [
                'category_name' => 'PKM'
            ],
            [
                'category_name' => 'PIM'
            ],
            [
                'category_name' => 'Beasiswa'
            ],
            [
                'category_name' => 'Lowongaan Kerja'
            ]
        ];

        foreach ($data_category as $data) {
            Category::create($data);
        }
    }
}
