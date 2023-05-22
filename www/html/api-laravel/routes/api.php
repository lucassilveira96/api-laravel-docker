<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;

Route::post('/clientes', [ClienteController::class, '__invoke']);
Route::get('/clientes', [ClienteController::class, '__invoke']);
Route::get('/clientes/{id}', [ClienteController::class, '__invoke']);
Route::patch('/clientes/{id}', [ClienteController::class, '__invoke']);

Route::get('/cep/{cep}', [CepController::class, '__invoke']);
