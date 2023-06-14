<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**P
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = DB::table('users')->insert([
            'avatar' => 'admin.png',
            'name' => 'Admin',
            'level' => 'admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
