<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Services\Cliente\ClienteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

class GetClienteController extends Controller
{
    /**
     * @var ClienteService
     */
    private $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    /**
     * @OA\Get(
     *     path="/api/clientes/{id}",
     *     tags={"Clientes"},
     *     summary="Exibe um cliente",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Dados do cliente"),
     * )
     * @OA\Get(
     *     path="/api/clientes",
     *     tags={"Clientes"},
     *     summary="Lista os clientes",
     *     @OA\Response(response="200", description="Lista de clientes"),
     * )
     */
    public function __invoke(Request $request)
    {
        try{
            $data = $request->route('id') ? $this->clienteService->getCliente($request->route('id')) : $this->clienteService->getAllClientes();

            return response()->json(['data'=>$data,
                'status'=>Response::HTTP_OK], Response::HTTP_OK);
        }catch(Exception $e){
            $exception = $e->getMessage();
            Log::error($exception);

            return response()->json(['data'=>'Error',
                'status'=>Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        }
    }
}
