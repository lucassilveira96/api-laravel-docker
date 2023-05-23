<?php

namespace App\Services\Cliente;

use App\Http\Requests\Cliente\NewClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

interface ClienteServiceInterface
{
    /**
     * Insert new client into database
     * @param array $data
     * @return Cliente|null
     */
    public function createCliente(array $data) : ?Cliente ;

    /**
     * get one client by id into database
     * @param int $id
     * @return Cliente|null
     */
    public function getCliente($id) : ?Cliente;

    /**
     * get all clients into database
     * @return Object|null
     */
    public function getAllClientes() : ?object;

    /**
     * Update one client by id into database
     * @param int $id, array $data
     * @retuen Cliente|null
     */
    public function updateCliente($id, array $data) : ?Cliente;
}
