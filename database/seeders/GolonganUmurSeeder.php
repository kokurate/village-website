<?php

namespace Database\Seeders;

use App\Models\GolonganUmur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganUmurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GolonganUmur::create([
            'data_desa_id' => 5,
            'umur' => '> 1 Tahun',
            'jumlah' => 37,
        ]);
    
        GolonganUmur::create([
            'data_desa_id' => 5,
            'umur' => '1 – 4 Tahun',
            'jumlah' => 179,
        ]);
    
        GolonganUmur::create([
            'data_desa_id' => 5,
            'umur' => '5 – 14 Tahun',
            'jumlah' => 405,
        ]);

        GolonganUmur::create([
            'data_desa_id' => 5,
            'umur' => '15 – 39 Tahun',
            'jumlah' => 959,
        ]);

        GolonganUmur::create([
            'data_desa_id' => 5,
            'umur' => '40 – 64 Tahun',
            'jumlah' => 728,
        ]);

        GolonganUmur::create([
            'data_desa_id' => 5,
            'umur' => '65 Tahun Ke atas',
            'jumlah' => 214,
        ]);

	

    }
}
