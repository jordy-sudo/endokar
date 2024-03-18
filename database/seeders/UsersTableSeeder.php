<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Usuario Compras',
                'email' => 'compras@enkador.ec',
                'password' => bcrypt('password'),
                'profile' => [
                    'avatar' => 'default_avatar.png',
                    'bio' => 'Este es el perfil del usuario de compras.',
                    'role' => 'compras',
                ],
            ],
            [
                'name' => 'Usuario Contabilidad',
                'email' => 'contabilidad@enkador.ec',
                'password' => bcrypt('password'),
                'profile' => [
                    'avatar' => 'default_avatar.png',
                    'bio' => 'Este es el perfil del usuario de contabilidad.',
                    'role' => 'contabilidad',
                ],
            ],
            // Agregar más usuarios según sea necesario
        ];
        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            // Create profile for the user
            Profile::create([
                'user_id' => $user->id,
                'avatar' => $userData['profile']['avatar'],
                'bio' => $userData['profile']['bio'],
            ]);
        }
    }
}
