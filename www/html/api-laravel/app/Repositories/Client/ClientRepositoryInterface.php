<?php

namespace App\Repositories\Client;

use App\Models\Client;

interface ClientRepositoryInterface
{
    /**
     * Insert new client into database
     */
    public function create(array $data): ?Client;

    /**
     * get one client by id into database
     */
    public function getById(int $id): ?Client;

    /**
     * Update one client by id into database
     */
    public function update(int $id, array $data): ?Client;

    /**
     * get all clients into database
     */
    public function getAll(): ?object;
}
