<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ClienteController extends Controller
{
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function __invoke(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                return $this->createCliente($request);
            case 'GET':
                if ($request->route('id')) {
                    return $this->getCliente($request->route('id'));
                } else {
                    return $this->getAllClientes();
                }
            case 'PATCH':
                return $this->updateCliente($request->route('id'), $request);
        }
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
     *         response="200",
     *         description="Cliente cadastrado com sucesso",
     *     ),
     * )
     */
    private function createCliente(Request $request)
    {
        $data = $request->only(['nome', 'telefone', 'email']);
        $cliente = $this->clienteRepository->create($data);
        return response()->json($cliente, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/clientes/{id}",
     *     tags={"Clientes"},
     *     summary="Exibe um cliente",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Dados do cliente"),
     * )
     */
    private function getCliente($id)
    {
        $cliente = $this->clienteRepository->getById($id);
        return response()->json($cliente);
    }

    /**
     * @OA\Get(
     *     path="/api/clientes",
     *     tags={"Clientes"},
     *     summary="Lista os clientes",
     *     @OA\Response(response="200", description="Lista de clientes"),
     * )
     */
    private function getAllClientes()
    {
        $clientes = $this->clienteRepository->getAll();
        return response()->json($clientes);
    }

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
    private function updateCliente($id, Request $request)
    {
        $data = $request->only(['nome', 'telefone', 'email']);
        $cliente = $this->clienteRepository->update($id, $data);
        return response()->json($cliente);
    }
}
