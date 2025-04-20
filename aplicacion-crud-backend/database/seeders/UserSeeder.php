<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1, // Asigna el ID del rol de administrador
        ]);

        // Puedes agregar más usuarios de prueba aquí si lo deseas
        // User::create([
        //     'name' => 'Usuario Regular',
        //     'email' => 'user@example.com',
        //     'password' => Hash::make('secret456'),
        //     'role_id' => 2, // Asigna el ID de otro rol si lo tienes
        // ]);
    }
}