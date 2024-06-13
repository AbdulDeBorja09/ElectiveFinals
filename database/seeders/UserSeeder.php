<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
             'name' => 'Test user',
             'email' => 'user@com',
             'password' => Hash::make('password'),
             'user_type' => 'user',
             'created_at' => now()
            ],
            [
             'name' => 'Test Admin',
             'email' => 'admin@com',
             'password' => Hash::make('password'),
             'user_type' => 'admin',
             'created_at' => now()
            ],
         ]);


         DB::table('customer')->insert([
            [
             'user_id' => 1,
             'name' => 'Test user',
             'email' => 'user@com',
             'age' => '20',
             'unit' => '3rd Floor, 3F1',
             'since' => 'June 20, 2023',
             'image' => 'profile.png',
             'created_at' => now()
            ],
         ]);
    }
}
