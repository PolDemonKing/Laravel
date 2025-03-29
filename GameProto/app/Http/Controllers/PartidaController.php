<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
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
        $partida = Partida::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'ronda' => $request->input('ronda') ?? 1,
                'turno' => $request->input('turno') ?? 1,
                'energia' => $request->input('energia') ?? 3,
                'maxEnergy' => $request->input('maxEnergy') ?? 3,
                'datos' => json_encode($request->input('datos') ?? [])
            ]
        );
    
        return response()->json(['success' => 'Partida guardada correctamente']);
    }
}
