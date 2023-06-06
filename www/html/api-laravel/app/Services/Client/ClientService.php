<?php

namespace App\Services\Client;

use App\Models\Client;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\Request;

/**
 * Class ClientService
 * @package App\Services\Client
 */
class ClientService implements ClientServiceInterface
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function createClient(array $data) : ?Client
    {
        return $this->clientRepository->create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getClient(int $id) : ?Client
    {
        return $this->clientRepository->getById($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllClients() : ?object
    {
        return $this->clientRepository->getAll();
    }

    /**
     * {@inheritDoc}
     */
    public function updateClient(int $id, array $data) : ?Client
    {
        return $this->clientRepository->update($id, $data);
    }
}




