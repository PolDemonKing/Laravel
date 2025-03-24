<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    /** @use HasFactory<\Database\Factories\PartidaFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'datos', 'ronda', 'turno', 'energia', 'maxEnergy'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
