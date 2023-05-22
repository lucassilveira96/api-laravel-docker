<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function __invoke(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                return $this->clienteService->createCliente($request);
            case 'GET':
                if ($request->route('id')) {
                    return $this->clienteService->getCliente($request->route('id'));
                } else {
                    return $this->clienteService->getAllClientes();
                }
            case 'PATCH':
                return $this->clienteService->updateCliente($request->route('id'), $request);
            default:
                return response()->json(['message' => 'Method not allowed'], 405);
        }
    }
}
