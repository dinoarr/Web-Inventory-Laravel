<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('akuadmin123'),
                'role' => 'Admin',    
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operator User',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('akuoperator'),    
                'role' => 'Operator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petugas User',
                'email' => 'petugas@gmail.com',
                'password' => Hash::make('akupetugas'),    
                'role' => 'Petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}