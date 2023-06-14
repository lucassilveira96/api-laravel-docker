<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewClientRequest;
use App\Http\Requests\Cliente\NewClienteRequest;
use App\Services\Client\ClientService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

/**
 * Controller responsible for updating a client by ID.
 */
class UpdateClientController extends Controller
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
     * Update a client by ID.
     *
     * @OA\Patch(
     *     path="/api/clients/{id}",
     *     tags={"Clients"},
     *     summary="Update client by id",
     *     description="Update client by id",
     *     operationId="updateClient",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID client",
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
     *                 property="name",
     *                 type="string",
     *                 example="John Doe"
     *             ),
     *             @OA\Property(
     *                 property="phone",
     *                 type="string",
     *                 example="12345678901"
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
     *         description="Update client by id",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 format="int64",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 example="John Doe"
     *             ),
     *             @OA\Property(
     *                 property="phone",
     *                 type="string",
     *                 example="12345678910"
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
     *         description="Client not found"
     *     )
     * )
     */
    public function __invoke(NewClientRequest $request)
    {
        try{
            $idClient = (int) $request->route('id');
            if($idClient > 0){
                $data = $this->clientService->updateClient($idClient,$request->validated());

                if($data){
                    return response()->json(
                        [
                            'data'=>$data,
                            'status'=>Response::HTTP_CREATED
                        ],
                        Response::HTTP_CREATED
                    );
                }else{
                    return response()->json(
                        [
                            'data'=>'Error',
                            'status'=>Response::HTTP_BAD_REQUEST
                        ]
                    );
                }
            }

        } catch(Exception $e){
            $exception = $e->getMessage();
            Log::error($exception);

            return response()->json(
                [
                    'data'=>'Error',
                    'status'=>Response::HTTP_BAD_REQUEST
                ]
            );
        }
    }
}
