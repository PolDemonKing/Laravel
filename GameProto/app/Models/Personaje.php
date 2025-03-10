<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $table = 'personajes'; 
    protected $fillable = ['nombre', 'vida', 'ataque', 'defensa', 'nivel', 'tipo'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
