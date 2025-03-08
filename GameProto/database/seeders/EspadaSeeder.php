<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Espada;

class EspadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Espada::factory()->create([
            'nombre' => 'Espada_de_madera',
            'descripcion' => 'Un espada de madera que se usa en los entrenamientos infantiles.',
            'ataque' => 2,
            'tipo' => 'object',
        ]);
    }
}
