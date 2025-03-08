<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slime extends Model
{
    use HasFactory;

    protected $table = 'slimes'; 
    protected $fillable = ['nombre', 'vida', 'ataque', 'defensa', 'nivel', 'tipo', 'descripcion'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
