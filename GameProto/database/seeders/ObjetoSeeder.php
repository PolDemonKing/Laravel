<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Objeto;
use App\Enums\Efecto;

class ObjetoSeeder extends Seeder
{
    public function run(): void
    {
        Objeto::factory()->create([
            'nombre' => 'Espada_de_madera',
            'descripcion' => 'Un espada de madera que se usa en los entrenamientos infantiles.',
            'efecto' => Efecto::ATAQUE->value,
            'efectCant' => 2,
            'coste' => 1,
            'tipo' => 'object',
        ]);

        Objeto::factory()->create([
            'nombre' => 'Escudo_de_madera',
            'descripcion' => 'Un escudo de madera que se usa en los entrenamientos infantiles.',
            'efecto' => Efecto::DEFENSA->value,
            'efectCant' => 2,
            'coste' => 1,
            'tipo' => 'object',
        ]);

        Objeto::factory()->create([
            'nombre' => 'Pocion_de_vida_menor',
            'descripcion' => 'Una pocion de curacion hecha con ingredientes de mala calidad.',
            'efecto' => Efecto::CURA->value,
            'efectCant' => 5,
            'coste' => 1,
            'tipo' => 'object',
        ]);
    }
}
