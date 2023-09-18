<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Usaha']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Tidak Mampu']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Miskin']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Belum Pernah Menikah']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Kelahiran']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Kematian']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Beda Agama']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Penghasilan']);
        JenisSurat::create(['nama_surat' => 'Surat Keterangan Harga Tanah']);
    }
}
