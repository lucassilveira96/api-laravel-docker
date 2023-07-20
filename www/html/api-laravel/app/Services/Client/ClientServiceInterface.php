<?php

namespace App\Services\Client;

use App\Models\Client;

/**
 * Interface ClientServiceInterface
 */
interface ClientServiceInterface
{
    /**
     * Insert a new client into the database.
     *
     * @param  array  $data The data for the new client.
     * @return Client|null The created client instance or null if the creation fails.
     */
    public function createClient(array $data): ?Client;

    /**
     * Get a client by ID from the database.
     *
     * @param  int  $id The ID of the client.
     * @return Client|null The client instance or null if the client is not found.
     */
    public function getClient(int $id): ?Client;

    /**
     * Get all clients from the database.
     *
     * @return object|null The collection of clients or null if no clients are found.
     */
    public function getAllClients(): ?object;

    /**
     * Update a client by ID in the database.
     *
     * @param  int  $id The ID of the client to update.
     * @param  array  $data The updated data for the client.
     * @return Client|null The updated client instance or null if the update fails.
     */
    public function updateClient(int $id, array $data): ?Client;
}
