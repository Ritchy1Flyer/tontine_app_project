<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'prenom' => 'Super',
            'nom' => 'Admin',
            'telephone' => '123456789',
            'email' => 'flyerfree18@gmail.com',
            'password' => Hash::make('password'),
            'profil' => 'SUPER_ADMIN',
        ]);
    }
}
