<?php

namespace App\Http\Controllers;

use App\Services\CepService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Teste Laravel",
 *     version="1.0.0",
 *     description="Api teste Laravel"
 * )
 */
class CepController extends Controller
{
    private $cepService;

    public function __construct(CepService $cepService)
    {
        $this->cepService = $cepService;
    }

    /**
     * @OA\Get(
     *     path="/api/cep/{cep}",
     *     tags={"Cep"},
     *     summary="Exibe um cliente",
     *     @OA\Parameter(name="cep", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Dados do Cep"),
     * )
     */
    public function __invoke(Request $request)
    {
        $cep = $request->route('cep');
        $data = $this->cepService->getCepData($cep);

        return response()->json($data);
    }
}
