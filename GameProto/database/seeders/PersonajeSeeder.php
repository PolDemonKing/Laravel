<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personaje;

class PersonajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personaje::factory()->create([
            'nombre' => 'Mage',
            'vida' => 24,
            'ataque' => 7,
            'defensa' => 3,
            'nivel' => 1,
            'tipo' => 'player',
            'descripcion' => 'The Little Mage',
        ]);
    }
}
