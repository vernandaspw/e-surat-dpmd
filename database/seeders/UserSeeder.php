<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'bagian' => 'admin',
                'isaktif' => true,
            ],
            [
                'nama' => 'kadis',
                'username' => 'kadis',
                'password' => Hash::make('password'),
                'role'=> 'kadis',
                'bagian' => 'kepala dinas',
                'isaktif' => true,
            ],
            [
                'nama' => 'subbag',
                'username' => 'subbag',
                'password' => Hash::make('password'),
                'role'=> 'subbag',
                'bagian' => 'Umum',
                'isaktif' => true,
            ],
            [
                'nama' => 'staff',
                'username' => 'staff',
                'password' => Hash::make('password'),
                'role'=> 'staff',
                'bagian' => 'Umum',
                'isaktif' => true,
            ]
        ]);
    }
}
