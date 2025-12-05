<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name'      => 'Admin Test',
                'password'  => Hash::make('A123456789A'),
                'is_admin'  => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'auteur@test.com'],
            [
                'name'      => 'Auteur Test',
                'password'  => Hash::make('A123456789A'),
                'is_admin'  => false,
            ]
        );
    }
}
