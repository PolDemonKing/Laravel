<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Objeto;
use App\Models\Entity;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function view() {
        $this->store();
        $cartas = Carta::with('cartaable')->get();
        return view('battleground', compact('cartas'));
    }

    public function viewCards() {
        $this->store();
        $cartas = Carta::with('cartaable')->get();
        return view('cardBook', compact('cartas'));
    }

    public function store(): void
    {
        $modelos = [
            Objeto::class,
            Entity::class,
        ];

        foreach ($modelos as $modelo) {
            $entidades = $modelo::all();

            foreach ($entidades as $entidad) {
                $cartaExistente = Carta::where('cartaable_id', $entidad->id)
                ->where('cartaable_type', $modelo)
                ->first();

                if (!$cartaExistente) {
                Carta::create([
                    'nombre' => $entidad->nombre,
                    'descripcion' => $entidad->descripcion,
                    'imagen' => $entidad->nombre . '.png',
                    'tipo' => $entidad->tipo,
                    'cartaable_id' => $entidad->id,
                    'cartaable_type' => $modelo
                ]);
                }
            }
        }
    }
}