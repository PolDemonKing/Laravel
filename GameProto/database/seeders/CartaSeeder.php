<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carta;
use App\Models\Goblin;
use App\Models\Slime;
use App\Models\Espada;
use App\Models\Escudo;
use App\Models\Personaje;
use Illuminate\Support\Str;

class CartaSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     */
    public function run(): void
    {
        $modelos = [
            Slime::class,
            Espada::class,
            Escudo::class,
            Goblin::class,
            Personaje::class,
        ];

        foreach ($modelos as $modelo) {
            $entidades = $modelo::all();

        foreach ($entidades as $entidad) {
            Carta::create([
                'nombre' => $entidad->nombre,
                'descripcion' => $entidad->descripcion,
                'imagen' => $entidad->nombre . '.png',
                'tipo' => $entidad->tipo,
                'cartaable_id' => $entidad->id,
                'cartaable_type' => $modelo
            ]);
        }
    }
    }
}