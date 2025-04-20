<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['rol_name' => 'admin']); // Cambiamos 'name' a 'rol_name'
        // Puedes agregar más roles aquí si los necesitas
        // Role::create(['rol_name' => 'user']);
    }
}