<?php

namespace App\Services\Cliente;

use App\Models\Cliente;
use App\Repositories\Cliente\ClienteRepository;
use Illuminate\Http\Request;

class ClienteService implements ClienteServiceInterface
{
    /**
     * @var ClienteRepository
     */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function createCliente(array $data) : ?Cliente
    {
        return $this->clienteRepository->create($data);
    }


    public function getCliente($id) : ?Cliente
    {
        return $this->clienteRepository->getById($id);
    }

    public function getAllClientes() : ?object
    {
        return $this->clienteRepository->getAll();
    }

    public function updateCliente($id, array $data) : ?Cliente
    {
        return $this->clienteRepository->update($id, $data);
    }
}




