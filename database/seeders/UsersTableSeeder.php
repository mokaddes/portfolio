<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'mr.mokaddes@gmail.com'],
            [
                'name' => 'Mokaddes Hosain',
                'email' => 'mr.mokaddes@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
