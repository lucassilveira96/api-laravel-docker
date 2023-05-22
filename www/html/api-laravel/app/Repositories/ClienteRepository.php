<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\Cliente\ClienteRepositoryInterface;

class ClienteRepository implements ClienteRepositoryInterface
{
    private $clienteModel;

    public function __construct(Cliente $cliente)
    {
        $this->clienteModel = $cliente;
    }

    public function create(array $data)
    {
        return $this->clienteModel->create($data);
    }

    public function getById(int $id)
    {
        return $this->clienteModel->find($id);
    }

    public function update(int $id, array $data)
    {
        $cliente = $this->getById($id);
        $cliente->update($data);
        return $cliente;
    }

    public function getAll()
    {
        return $this->clienteModel->all();
    }
}
