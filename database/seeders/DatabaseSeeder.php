<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Agama;
use App\Models\JenisKelamin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(TypeSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(DataDesaSeeder::class);
        // $this->call(WilayahAdministratifSeeder::class);
        // $this->call(TingkatPendidikanSeeder::class);
        // $this->call(PekerjaanSeeder::class);
        // $this->call(JenisKelaminSeeder::class);
        // $this->call(GolonganUmurSeeder::class);
        $this->call(AgamaSeeder::class);

    }
}
