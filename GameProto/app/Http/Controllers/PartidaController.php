<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
use App\Models\Carta;
use Illuminate\Support\Facades\Auth;

class PartidaController extends Controller
{
    public function cargarPartida()
    {
        $partida = Partida::where('user_id', Auth::id())->first();

        if ($partida) {
            return response()->json(['partida' => $partida]);
        } else {
            return response()->json(['partida' => null]);
        }
    }

    public function guardarPartida(Request $request)
    {
        $userId = Auth::id();
    
        // Obtener la carta del jugador (player_card_id)
        $playerCard = Carta::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('tipo', 'player')->first();
    
        if (!$playerCard) {
            return response()->json(['error' => 'No se encontró una carta de tipo player asociada al usuario.'], 404);
        }
    
        // Validación de datos del Request
        $validated = $request->validate([
            'ronda' => 'integer|min:1',
            'turno' => 'integer|min:1',
            'enemigos' => 'array',
            'objetos' => 'array',
        ]);
    
        // Crear o actualizar partida
        $partida = Partida::updateOrCreate(
            ['user_id' => $userId],
            [
                'player_card_id' => $playerCard->id,
                'ronda' => $validated['ronda'] ?? 1,
                'turno' => $validated['turno'] ?? 1,
                'enemigos' => $validated['enemigos'] ?? [],
                'objetos' => $validated['objetos'] ?? [],
                'energiaMax' => $playerCard->energiaMax ?? config('app.energiaMax'), // Valor de energiaMax
                'energia' => $playerCard->energiaMax ?? config('app.energiaMax'), // Restablecer energía
            ]
        );
    
        return response()->json(['success' => 'Partida guardada correctamente', 'partida' => $partida]);
    }
}
