<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pocion extends Model
{
    use HasFactory;

    protected $table = 'pociones';
    protected $fillable = ['nombre', 'descripcion', 'tipo', 'vida'];

    public function carta()
    {
        return $this->morphOne(Carta::class, 'cartaable');
    }
}
