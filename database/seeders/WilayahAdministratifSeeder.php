<?php

namespace Database\Seeders;

use App\Models\WilayahAdministratif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahAdministratifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        WilayahAdministratif::create([
            'data_desa_id' => 1, 
            'dusun' => 'I',
            'kk' => 130,
            'laki_laki' => 176,
            'perempuan' => 154,
        ]);

        WilayahAdministratif::create([
            'data_desa_id' => 1, 
            'dusun' => 'II',
            'kk' => 111,
            'laki_laki' => 189,
            'perempuan' => 161,
        ]);

        WilayahAdministratif::create([
            'data_desa_id' => 1, 
            'dusun' => 'III',
            'kk' => 107,
            'laki_laki' => 222,
            'perempuan' => 196,
        ]);

        WilayahAdministratif::create([
            'data_desa_id' => 1, 
            'dusun' => 'IV',
            'kk' => 159,
            'laki_laki' => 352,
            'perempuan' => 247,
        ]);

        WilayahAdministratif::create([
            'data_desa_id' => 1, 
            'dusun' => 'V',
            'kk' => 106,
            'laki_laki' => 210,
            'perempuan' => 182,
        ]);

        WilayahAdministratif::create([
            'data_desa_id' => 1, 
            'dusun' => 'VI',
            'kk' => 263,
            'laki_laki' => 206,
            'perempuan' => 170,
        ]);
    }
}
