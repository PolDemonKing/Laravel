<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slime;

class SlimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slime::factory()->create([
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
