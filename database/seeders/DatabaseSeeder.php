<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Hash::make('Guru.100100100100');
        User::create([
            'name' => 'Superadmin',
            'tingkat' => '-',
            'username' => '100100100100',
            'password' => $password,
            'access' => 'superadmin',
            'token' => '1',
        ]);
    }
}
