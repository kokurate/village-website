<?php

namespace Database\Seeders;

use App\Models\TingkatPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TingkatPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tidak Sekolah / Buta Huruf',
            'jumlah' => 0,
        ]);


        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tidak Tamat SD/Sederajat',
            'jumlah' => 521,
        ]);

        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tamat SD / sederajat',
            'jumlah' => 678,
        ]);
        

        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tamat SLTP / sederajat',
            'jumlah' => 565,
        ]);


        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tamat SLTP / sederajat',
            'jumlah' => 565,
        ]);


        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tamat SLTA / sederajat',
            'jumlah' => 470,
        ]);

        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Tamat D1, D2, D3',
            'jumlah' => 47,
        ]);

        TingkatPendidikan::create([
            'data_desa_id' => 2,
            'tingkat_pendidikan' => 'Sarjana / S-1',
            'jumlah' => 35,
        ]);
 	
	

    }
}
