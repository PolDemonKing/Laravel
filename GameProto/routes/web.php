<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\PartidaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/battleground', [CartaController::class, 'view'])->middleware(['auth'])->name('battleground');
Route::get('/cardBook', [CartaController::class, 'viewCards'])->middleware(['auth'])->name('cardBook');

Route::get('/cardMaker', function () { return view('cardMaker');})->middleware(['auth'])->name('cardMaker');

Route::get('/startScreen', function () {
    return view('startScreen');
})->middleware(['auth'])->name('startScreen');

Route::get('/partida/cargar', [PartidaController::class, 'cargarPartida'])->middleware('auth');
Route::post('/partida/guardar', [PartidaController::class, 'guardarPartida'])->middleware('auth');

Route::resource('/entities', EntityController::class);
Route::resource('/objetos', ObjetoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
