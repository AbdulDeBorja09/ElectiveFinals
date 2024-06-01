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
            'user_type' => 'user'
           ],
           [
            'name' => 'Test Admin',
            'email' => 'admin@com',
            'password' => Hash::make('password'),
            'user_type' => 'admin'
           ],
        ]);
    }
}
