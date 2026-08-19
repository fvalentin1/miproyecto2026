<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::updateOrCreate(
            [
                'email' => 'admin@admin.cl',
            ],
            [
                'name' => 'Administrador',
                'password' => Hash::make('12345678'),
            ]
        );
        $user2 = User::updateOrCreate(
            [
                'email' => 'super@admin.cl',
            ],
            [
                'name' => 'SuperAdmin',
                'password' => Hash::make('12345678'),
            ]
        );
        $user3 = User::updateOrCreate(
            [
                'email' => 'user@example.com',
            ],
            [
                'name' => 'Usuario',
                'password' => Hash::make('12345678'),
            ]
        );

        $user1->assignRole('Administrador');
        $user2->assignRole('SuperAdministrador');
        $user3->assignRole('Usuario');
    }
}
