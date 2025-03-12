<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /** @use HasFactory<\Database\Factories\EntityFactory> */
    use HasFactory;

    protected $table = 'entities'; 
    protected $fillable = ['nombre', 'vida', 'ataque', 'defensa', 'nivel', 'tipo', 'descripcion'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
