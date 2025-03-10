<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Goblin;

class GoblinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Goblin::factory()->create([
            'nombre' => 'Goblin',
            'vida' => 12,
            'ataque' => 1,
            'defensa' => 3,
            'nivel' => 1,
            'tipo' => 'monster',
            'descripcion' => 'Una criatura verde y muy argresiva, se mueven en grupo y son medio inteligentes.',
        ]);
    }
}
