<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    public function index()
    {
        $entities = Entity::all();
        return view('entities.index', compact('entities'));
    }

    public function create()
    {
        return view('entities.create');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('entities.index')->with('success', 'Entidad creada exitosamente.');
    }

    public function show(Entity $entity)
    {
        return view('entities.show', compact('entity'));
    }

    public function edit(Entity $entity)
    {
        return view('entities.edit', compact('entity'));
    }

    public function update(Request $request, Entity $entity)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:monster,player,npc',
            'vida' => 'required|integer|min:1',
            'ataque' => 'required|integer|min:0',
            'defensa' => 'required|integer|min:0',
            'nivel' => 'required|integer|min:0',
        ]);

        $entity->update($validated);

        return redirect()->route('entities.index')->with('success', 'Entidad actualizada correctamente.');
    }

    public function destroy(Entity $entity)
    {
        $entity->delete();
        return redirect()->route('entities.index')->with('success', 'Entidad eliminada correctamente.');
    }
}
