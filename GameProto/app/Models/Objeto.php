<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Efecto;

class Objeto extends Model
{
    use HasFactory;

    protected $casts = [
        'efecto' => Efecto::class,
    ];

    protected $table = 'objetos';
    protected $fillable = ['nombre', 'descripcion', 'tipo', 'efecto', 'efectCant', 'coste'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
