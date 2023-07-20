<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ClientService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

/**
 * Controller responsible for retrieving all clients.
 */
class GetAllClientsController extends Controller
{
    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * Constructor.
     *
     * @param  ClientService  $clientService The client service.
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Retrieves all clients.
     *
     * @OA\Get(
     *     path="/api/clients",
     *     tags={"Clients"},
     *     summary="Get all clients",
     *
     *     @OA\Response(response="200", description="Get all clients"),
     * )
     */
    public function __invoke()
    {
        try {
            $data = $this->clientService->getAllClients();

            return response()->json(
                [
                    'data' => $data,
                    'status' => Response::HTTP_OK,
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            $exception = $e->getMessage();
            Log::error(
                $e->getMessage,
                [
                    'code' => 'client_api_log',
                    'exception' => $exception,
                ]
            );

            return response()->json(
                [
                    'data' => 'Error',
                    'status' => Response::HTTP_BAD_REQUEST,
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
