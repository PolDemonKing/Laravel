<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class,'index']);
Route::post('/store', [TaskController::class, 'store']);
Route::get('/create', [TaskController::class,'create']);