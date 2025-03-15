<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function store(Request $request)
    {
        $request->headers->set('Accept', 'application/json');
        \Log::info("Petición recibida en EntitiesController:", $request->all());

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:monster,player,npc',
            'vida' => 'required|integer|min:1',
            'ataque' => 'required|integer|min:0',
            'defensa' => 'required|integer|min:0',
            'nivel' => 'required|integer|min:1',
        ]);

        Entity::create($validated);
        return response()->json(['success' => 'Entidad creada correctamente']);
    }
}