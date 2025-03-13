<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    public function index()
    {
        $objetos = Objeto::all();
        return view('objetos.index', compact('objetos'));
    }

    public function create()
    {
        return view('objetos.create');
    }

    public function store(Request $request)
    {
        Objeto::create($request->all());
        return redirect()->route('objetos.index')->with('success', 'Objeto creado correctamente.');
    }

    public function edit(Objeto $objeto)
    {
        return view('objetos.edit', compact('objeto'));
    }

    public function update(Request $request, Objeto $objeto)
    {
        $objeto->update($request->all());
        return redirect()->route('objetos.index')->with('success', 'Objeto actualizado.');
    }

    public function destroy(Objeto $objeto)
    {
        $objeto->delete();
        return redirect()->route('objetos.index')->with('success', 'Objeto eliminado.');
    }
}
