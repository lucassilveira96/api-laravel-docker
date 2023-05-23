<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Services\Cliente\ClienteService;
use Illuminate\Http\Request;


class UpdateClienteController extends Controller
{
    /**
     * @var ClienteService
     */
    private $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function __invoke(Request $request)
    {

    }
}
