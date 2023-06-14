<?php

namespace App\Http\Controllers\Cep;

use App\Http\Controllers\Controller;
use App\Services\Cep\CepService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

/**
 * Controller responsible for retrieving information about a CEP.
 *
 * @OA\Info(
 *     title="Teste Laravel",
 *     version="1.0.0",
 *     description="Api teste Laravel"
 * )
 */
class GetCepController extends Controller
{
    /**
     * @var CepService
     */
    private $cepService;


    /**
     * Constructor.
     *
     * @param CepService $cepService The CEP service.
     */
    public function __construct(CepService $cepService)
    {
        $this->cepService = $cepService;
    }

    /**
     * Get information about a CEP.
     *
     * @OA\Get(
     *     path="/api/cep/{cep}",
     *     tags={"Cep"},
     *     summary="Exibe um cep",
     *     @OA\Parameter(name="cep", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Dados do Cep"),
     * )
     */
    public function __invoke(int $cep)
    {
       try{
           $data = $this->cepService->getCepData($cep);

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
