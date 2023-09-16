<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelamin::create([
            'data_desa_id' => 4,
            'jenis_kelamin' => 'Laki - Laki',
            'jumlah' => 1292,
        ]);

        JenisKelamin::create([
            'data_desa_id' => 4,
            'jenis_kelamin' => 'Perempuan',
            'jumlah' => 1230,
        ]);



    }
}
