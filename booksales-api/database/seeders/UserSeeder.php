<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Tere',
            'email' => 'tere@gmail.com',
            'password' => bcrypt('tere'),
            'role' => 'customer'
        ]);
        User::create([
            'name' => 'Liye',
            'email' => 'liye@gmail.com',
            'password' => bcrypt('liye'),
            'role' => 'admin'
        ]);
    }
}
