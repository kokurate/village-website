<?php

namespace Database\Seeders;

use App\Models\DataDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataDesa::create(['nama_data' => 'Wilayah Administratif']); // 1
        DataDesa::create(['nama_data' => 'Tingkat Pendidikan']); // 2
        DataDesa::create(['nama_data' => 'Mata Pencaharian']); // 3
        DataDesa::create(['nama_data' => 'Jenis Kelamin']); // 4
        DataDesa::create(['nama_data' => 'Golongan Umur']); // 5
        DataDesa::create(['nama_data' => 'Agama']); // 6

    }
}
