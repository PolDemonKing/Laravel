<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goblin extends Model
{
    use HasFactory;
    
    protected $table = 'goblins'; 
    protected $fillable = ['nombre', 'vida', 'ataque', 'defensa', 'nivel', 'tipo', 'descripcion'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
