<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\NewClienteRequest;
use App\Services\Cliente\ClienteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


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
    public function __invoke(NewClienteRequest $request)
    {
        try{
            $idCliente = (int) $request->route('id');
            if($idCliente > 0){
                $data = $this->clienteService->updateCliente($idCliente,$request->validated());

                if($data){
                    return response()->json(['data'=>$data,
                        'status'=>Response::HTTP_CREATED], Response::HTTP_CREATED);
                }else{
                    return response()->json(['data'=>'Error',
                        'status'=>Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
                }
            }

        } catch(Exception $e){
            $exception = $e->getMessage();
            Log::error($exception);

            return response()->json(['data'=>'Error',
                'status'=>Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        }
    }
}
