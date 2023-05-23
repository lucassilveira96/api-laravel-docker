<?php

use App\Http\Controllers\Cep\GetCepController;
use App\Http\Controllers\Cliente\GetClienteController;
use App\Http\Controllers\Cliente\NewClienteController;

use App\Http\Controllers\Cliente\UpdateClienteController;
use Illuminate\Support\Facades\Route;

Route::post('/clientes', [NewClienteController::class, '__invoke']);
Route::get('/clientes', [GetClienteController::class, '__invoke']);
Route::get('/clientes/{id}', [GetClienteController::class, '__invoke']);
Route::patch('/clientes/{id}', [UpdateClienteController::class, '__invoke']);

Route::get('/cep/{cep}', [GetCepController::class, '__invoke']);
