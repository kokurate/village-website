<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kokurate',
            'email' => 'kokurate@dev.com',
            'password' => bcrypt('password'),
            'username' => 'kokurate',
            'type' => 1,
            'direct_publish' => 1,
        ]);
        
        User::create([
            'name' => 'bubble',
            'email' => 'bubble@dev.com',
            'password' => bcrypt('password'),
            'username' => 'bubble',
            'type' => 2,
            // 'direct_publish' => 1,
        ]);

    }
}
