<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ClienteController extends Controller
{
    private $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    /**
     * @OA\Post(
     *     path="/api/clientes",
     *     tags={"Clientes"},
     *     summary="Cadastro de clientes",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"nome", "telefone", "email"},
     *             @OA\Property(property="nome", type="string", example="John Doe"),
     *             @OA\Property(property="telefone", type="string", example="1234567890"),
     *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Cliente cadastrado com sucesso",
     *     ),
     * )
     */

    /**
     * @OA\Get(
     *     path="/api/clientes/{id}",
     *     tags={"Clientes"},
     *     summary="Exibe um cliente",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Dados do cliente"),
     * )
     */
    
    /**
     * @OA\Get(
     *     path="/api/clientes",
     *     tags={"Clientes"},
     *     summary="Lista os clientes",
     *     @OA\Response(response="200", description="Lista de clientes"),
     * )
     */

    /**
     * @OA\Patch(
     *     path="/api/clientes/{id}",
     *     tags={"Clientes"},
     *     summary="Atualizar informações do cliente",
     *     description="Atualiza as informações de um cliente pelo ID",
     *     operationId="updateCliente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do cliente",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             example=1
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="nome",
     *                 type="string",
     *                 example="John Doe"
     *             ),
     *             @OA\Property(
     *                 property="telefone",
     *                 type="string",
     *                 example="1234567890"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 format="email",
     *                 example="johndoe@example.com"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Informações do cliente atualizadas com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 format="int64",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="nome",
     *                 type="string",
     *                 example="John Doe"
     *             ),
     *             @OA\Property(
     *                 property="telefone",
     *                 type="string",
     *                 example="1234567890"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 format="email",
     *                 example="johndoe@example.com"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cliente não encontrado"
     *     )
     * )
     */
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
