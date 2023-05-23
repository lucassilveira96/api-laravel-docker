<?php

namespace App\Services\Cliente;

use App\Http\Requests\Cliente\NewClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

interface ClienteServiceInterface
{
    public function createCliente(array $data) : ?Cliente ;
    public function getCliente($id) : ?Cliente;
    public function getAllClientes() : ?object;
    public function updateCliente($id, array $data) : ?Cliente;
}
