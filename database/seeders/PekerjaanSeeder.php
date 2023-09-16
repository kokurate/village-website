<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Pekerjaan::create([
            'data_desa_id' => 3,
            'nama' => 'Tani',
            'jumlah' => 1569
        ]);

        Pekerjaan::create([
            'data_desa_id' => 3,
            'nama' => 'Dagang',
            'jumlah' => 46,
        ]);
        
        Pekerjaan::create([
            'data_desa_id' => 3,
            'nama' => 'Buruh Tani',
            'jumlah' => 88,
        ]);

        Pekerjaan::create([
            'data_desa_id' => 3,
            'nama' => 'PNS/TNI/Polri',
            'jumlah' => 44,
        ]);

        Pekerjaan::create([
            'data_desa_id' => 3,
            'nama' => 'Swasta',
            'jumlah' => 14,
        ]);

        Pekerjaan::create([
            'data_desa_id' => 3,
            'nama' => 'Lain-lain',
            'jumlah' => 761,
        ]);
        		 			
					

    }
}
