<?php

namespace App\Services;

use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;


class ClienteService
{
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function createCliente(Request $request)
    {
        $data = $request->only(['nome', 'telefone', 'email']);
        $cliente = $this->clienteRepository->create($data);
    
        return response()->json($cliente, 201);
    }

    public function getCliente($id)
    {
        $cliente = $this->clienteRepository->getById($id);
        if (!$cliente) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        return response()->json($cliente);
    }

    public function getAllClientes()
    {
        $clientes = $this->clienteRepository->getAll();
        return response()->json($clientes);
    }

    public function updateCliente($id, Request $request)
    {
        $data = $request->only(['nome', 'telefone', 'email']);
        $cliente = $this->clienteRepository->update($id, $data);
        if (!$cliente) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        return response()->json($cliente);
    }
}
