<?php

namespace App\Repositories\Client;

use App\Models\Client;

interface ClientRepositoryInterface
{
    /**
     * Insert new client into database
     * @param array $data
     * @return Client|null
     */
    public function create(array $data) : ?Client;

    /**
     * get one client by id into database
     * @param int $id
     * @return Client|null
     */
    public function getById(int $id) : ?Client;

    /**
     * Update one client by id into database
     * @param int $id, array $data
     * @return Client|null
     */
    public function update(int $id, array $data) : ?Client;

    /**
     * get all clients into database
     * @return Object|null
     */
    public function getAll() : ?object;
}
