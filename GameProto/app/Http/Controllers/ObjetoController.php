<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    public function store(Request $request)
    {

        \Log::info("Petición recibida en ObjetosController:", $request->all());

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'efecto' => 'required|string|max:100',
            'efectCant' => 'required|integer|min:1',
            'coste' => 'required|integer|min:0',
            'tipo' => 'required|in:object',
        ]);

        Objeto::create($validated);

        return response()->json(['success' => 'Objeto creado correctamente']);
    }
}