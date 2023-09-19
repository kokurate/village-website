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
            'name' => 'root',
            'email' => 'root@dev.com',
            'password' => bcrypt('password'),
            'username' => 'root',
            'type' => 1,
            'direct_publish' => 1,
        ]);
        
        User::create([
            'name' => 'user',
            'email' => 'user@dev.com',
            'password' => bcrypt('password'),
            'username' => 'user',
            'type' => 2,
            // 'direct_publish' => 1,
        ]);

    }
}
