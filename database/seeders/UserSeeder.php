<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Provincia;
use App\Models\Municipio;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criar usuários
        $user1 = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'current_team_id' => null,
            'profile_photo_path' => null,
            'accessId' => 1, // Admin Access
        ]);

        $user2 = User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'current_team_id' => null,
            'profile_photo_path' => null,
            'accessId' => 2, // User Access
        ]);

        // Criar províncias associadas aos usuários
        $provincia1 = Provincia::create([
            'name' => 'Luanda',
            'userId' => $user1->id,
        ]);

        $provincia2 = Provincia::create([
            'name' => 'Benguela',
            'userId' => $user2->id,
        ]);

        // Criar municípios associados às províncias
        Municipio::create([
            'name' => 'Luanda',
            'provinceId' => $provincia1->id,
        ]);



        Municipio::create([
            'name' => 'Lobito',
            'provinceId' => $provincia2->id,
        ]);


    }
}
