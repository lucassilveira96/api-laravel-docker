<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewClientRequest;
use App\Services\Client\ClientService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

/**
 * Controller responsible for creating a new client.
 */
class NewClientController extends Controller
{
    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * Constructor.
     *
     * @param ClientService $clientService The client service.
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Create a new client.
     *
     * @OA\Post(
     *     path="/api/clients",
     *     tags={"Clients"},
     *     summary="Create client",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "phone", "email"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="phone", type="string", example="12345678910"),
     *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Cliente cadastrado com sucesso",
     *     ),
     * )
     */
    public function __invoke(NewClientRequest $request)
    {
        try{
            $data = $this->clientService->createClient($request->validated());

            return response()->json(
                [
                    'data'=>$data,
                    'status'=>Response::HTTP_CREATED
                ],
                Response::HTTP_CREATED
            );

        } catch(Exception $e){
            $exception = $e->getMessage();
            Log::error($exception);

            return response()->json(
                [
                    'data'=>'Error',
                    'status'=>Response::HTTP_BAD_REQUEST
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
