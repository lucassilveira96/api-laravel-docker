<?php

namespace App\Repositories\Cliente;

use App\Models\Cliente;
use App\Repositories\Cliente\ClienteRepositoryInterface;
use http\Client;

class ClienteRepository implements ClienteRepositoryInterface
{
    private $clienteModel;

    public function __construct(Cliente $cliente)
    {
        $this->clienteModel = $cliente;
    }

    public function create(array $data) : ?Cliente
    {
        return $this->clienteModel->create($data);
    }

    public function getById(int $id) : ?Cliente
    {
        return $this->clienteModel->find($id);
    }

    public function update(int $id, array $data) : ?Cliente
    {
        $cliente = $this->getById($id);
        $cliente->update($data);
        return $cliente;
    }

    public function getAll() : ?object
    {
        return $this->clienteModel->all();
    }
}
