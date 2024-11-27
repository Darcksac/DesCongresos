<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
    
        User::create([
            'name' => 'AdminUdg',
            'email' => 'admin1@admin.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}

