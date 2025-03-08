<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function view() {
        $carta = Carta::with('cartaable')->first();
        return view('battleground', compact('carta'));
    }
}
