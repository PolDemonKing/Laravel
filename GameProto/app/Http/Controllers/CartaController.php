<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function view() {
        $cartas = Carta::with('cartaable')->get();
        return view('battleground', compact('cartas'));
    }
}
