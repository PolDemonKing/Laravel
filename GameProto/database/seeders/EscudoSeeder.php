<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Escudo;

class EscudoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Escudo::factory()->create([
            'nombre' => 'Escudo_de_madera',
            'descripcion' => 'Un escudo de madera que se usa en los entrenamientos infantiles.',
            'defensa' => 2,
            'tipo' => 'object',
        ]);
    }
}
