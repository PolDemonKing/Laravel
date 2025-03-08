<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carta;
use App\Models\Slime;

class CartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slime = Slime::first(); 

        if ($slime) {
            Carta::create([
                'nombre' => $slime->nombre,
                'descripcion' => 'Una criatura viscosa y gelatinosa.',
                'imagen' => 'slime.jpg',
                'id' => $slime->id,
                'tipo' => $slime->tipo,
                'cartaable_id' => $slime->id,
                'cartaable_type' => Slime::class
            ]);
        }
    }
}
