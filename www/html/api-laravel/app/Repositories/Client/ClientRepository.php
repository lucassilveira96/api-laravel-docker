<?php

namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\Client\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @var Clients
     */
    private $clientModel;

    public function __construct(Client $client)
    {
        $this->clientModel = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $data) : ?Client
    {
        return $this->clientModel->create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $id) : ?Client
    {
        return $this->clientModel->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, array $data) : ?Client
    {
        $client = $this->getById($id);
        $client->update($data);
        return $client;
    }

    /**
     * {@inheritDoc}
     */
    public function getAll() : ?object
    {
        return $this->clientModel->all();
    }
}
