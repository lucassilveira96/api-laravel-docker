<?php

namespace App\Services;

use GuzzleHttp\Client;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Teste Laravel",
 *     version="1.0.0",
 *     description="Api teste Laravel"
 * )
 */
class CepService
{
    /**
     * @OA\Get(
     *     path="/api/cep/{cep}",
     *     tags={"Cep"},
     *     summary="Exibe um cliente",
     *     @OA\Parameter(name="cep", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Dados do Cep"),
     * )
     */
    public function getCepData($cep)
    {
        $url = env('URL_BUSCA_CEP');
        $client = new Client();
        $response = $client->request('GET', "{$url}{$cep}");
        return json_decode($response->getBody(), true);
    }
}
