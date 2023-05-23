<?php

namespace App\Repositories\Cliente;

use App\Models\Cliente;

interface ClienteRepositoryInterface
{
    public function create(array $data) : ?Cliente;

    public function getById(int $id) : ?Cliente;

    public function update(int $id, array $data) : ?Cliente;

    public function getAll() : ?object;
}
