<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository
{
    public function create(array $data)
    {
        return Cliente::create($data);
    }

    public function getById(int $id)
    {
        return Cliente::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $cliente = $this->getById($id);
        $cliente->update($data);
        return $cliente;
    }

    public function getAll()
    {
        return Cliente::all();
    }
}
