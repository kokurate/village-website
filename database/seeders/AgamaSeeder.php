<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::create([
            'data_desa_id' => 6,
            'nama' => 'Islam',
            'jumlah' => 1757,
        ]);

        Agama::create([
            'data_desa_id' => 6,
            'nama' => 'Kristen',
            'jumlah' => 750,
        ]);

        Agama::create([
            'data_desa_id' => 6,
            'nama' => 'Katholik',
            'jumlah' => 15,
        ]);

        Agama::create([
            'data_desa_id' => 6,
            'nama' => 'Hindu',
            'jumlah' => 0,
        ]);

        Agama::create([
            'data_desa_id' => 6,
            'nama' => 'Budha',
            'jumlah' => 0,
        ]);


    }
}
