<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espada extends Model
{
    use HasFactory;
    
    protected $table = 'espadas';
    protected $fillable = ['nombre', 'descripcion', 'tipo', 'ataque'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
