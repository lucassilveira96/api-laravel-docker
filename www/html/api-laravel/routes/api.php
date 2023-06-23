<?php

use App\Http\Controllers\Cep\GetCepController;
use App\Http\Controllers\Client\GetAllClientsController;
use App\Http\Controllers\Client\GetOneClientController;
use App\Http\Controllers\Client\NewClientController;
use App\Http\Controllers\Client\UpdateClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/clients', NewClientController::class)->name('newClient');

Route::get('/clients', GetAllClientsController::class)->name('getAllClients');

Route::get('/clients/{id}', GetOneClientController::class)->name('getOneClient');

Route::patch('/clients/{id}', UpdateClientController::class)->name('updateClient');

Route::get('/cep/{cep}', GetCepController::class)->name('getCep');
