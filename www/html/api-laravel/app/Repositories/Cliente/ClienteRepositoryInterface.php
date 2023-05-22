<?php

namespace App\Repositories\Cliente;

interface ClienteRepositoryInterface
{
    public function create(array $data);

    public function getById(int $id);

    public function update(int $id, array $data);
    
    public function getAll();
}