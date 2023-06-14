<?php

namespace app\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ClientService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

/**
 * Controller responsible for retrieving one client by ID.
 */
class GetOneClientController extends Controller
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
     * Retrieves one client by ID.
     *
     * @OA\Get(
     *     path="/api/clients/{id}",
     *     tags={"Clients"},
     *     summary="Get one client by id",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Get one client by id"),
     * )
     */
    public function __invoke(Request $request)
    {
        try{
            $data = $this->clientService->getClient($request->route('id'));

            return response()->json(
                [
                    'data'=>$data,
                    'status'=>Response::HTTP_OK
                ]
            );
        }catch(Exception $e){
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
