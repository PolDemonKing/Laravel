<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $table = 'cartas';
    protected $fillable = ['nombre', 'descripcion', 'tipo', 'imagen', 'cartaable_id', 'cartaable_type'];

    public function cartaable()
    {
        return $this->morphTo();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
