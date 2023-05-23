<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\NewClienteRequest;
use App\Services\Cliente\ClienteService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

class NewClienteController extends Controller
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
    public function __invoke(NewClienteRequest $request)
    {
        try{
            $data = $this->clienteService->createCliente($request->validated());

            if($data){
                return response()->json(['data'=>$data,
                    'status'=>Response::HTTP_CREATED], Response::HTTP_CREATED);
            }else{
                return response()->json(['data'=>'Error',
                    'status'=>Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
            }

        } catch(Exception $e){
            $exception = $e->getMessage();
            Log::error($exception);

            return response()->json(['data'=>'Error',
                'status'=>Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        }
    }
}
