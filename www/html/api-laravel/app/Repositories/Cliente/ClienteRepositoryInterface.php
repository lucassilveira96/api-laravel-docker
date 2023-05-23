<?php

namespace App\Repositories\Cliente;

use App\Models\Cliente;

interface ClienteRepositoryInterface
{
    /**
     * Insert new client into database
     * @param array $data
     * @retuen Cliente|null
     */
    public function create(array $data) : ?Cliente;

    /**
     * get one client by id into database
     * @param int $id
     * @retuen Cliente|null
     */
    public function getById(int $id) : ?Cliente;

    /**
     * Update one client by id into database
     * @param int $id, array $data
     * @retuen Cliente|null
     */
    public function update(int $id, array $data) : ?Cliente;

    /**
     * get all clients into database
     * @retuen Object|null
     */
    public function getAll() : ?object;
}
