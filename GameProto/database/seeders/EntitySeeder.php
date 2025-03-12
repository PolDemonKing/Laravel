<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entity::factory()->create([
            'nombre' => 'Goblin',
            'vida' => 12,
            'ataque' => 1,
            'defensa' => 3,
            'nivel' => 1,
            'tipo' => 'monster',
            'descripcion' => 'Pequeña criatura verde, agresiva y consciente.',
        ]);

        Entity::factory()->create([
            'nombre' => 'Mage',
            'vida' => 24,
            'ataque' => 7,
            'defensa' => 3,
            'nivel' => 1,
            'tipo' => 'player',
            'descripcion' => 'The Little Mage',
        ]);

        Entity::factory()->create([
            'nombre' => 'Slime',
            'vida' => 12,
            'ataque' => 1,
            'defensa' => 3,
            'nivel' => 1,
            'tipo' => 'monster',
            'descripcion' => 'Una criatura viscosa y gelatinosa.',
        ]);
    }
}
