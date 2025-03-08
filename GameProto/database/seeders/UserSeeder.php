<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Opción 1: Eliminar los registros antes de insertar (solo en desarrollo)
        DB::table('users')->truncate();

        // Opción 2: Verificar si el usuario ya existe antes de crearlo
        User::firstOrCreate(
            ['email' => 'test@example.com'], // Busca por email
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Define un password por defecto
            ]
        );
    }
}
