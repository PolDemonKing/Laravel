<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    /** @use HasFactory<\Database\Factories\PartidaFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'player_card_id',
        'ronda',
        'turno',
        'energia',
        'energiaMax',
        'enemigos',
        'objetos',
    ];
    
    protected $casts = [
        'enemigos' => 'array',
        'objetos' => 'array',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
