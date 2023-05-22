<?php

namespace App\Http\Controllers;

use App\Services\CepService;
use Illuminate\Http\Request;

class CepController extends Controller
{
    private $cepService;

    public function __construct(CepService $cepService)
    {
        $this->cepService = $cepService;
    }

    
    public function __invoke(Request $request)
    {
        $cep = $request->route('cep');
        $data = $this->cepService->getCepData($cep);

        return response()->json($data);
    }
}
