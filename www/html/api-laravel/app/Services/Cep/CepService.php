<?php

namespace App\Services\Cep;

use GuzzleHttp\Client;

/**
 * Class CepService
 * @package App\Services\Cep
 */
class CepService implements CepServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function getCepData($cep) : ?array
    {
        $url = env('URL_BUSCA_CEP');
        $client = new Client();
        $response = $client->request('GET', "{$url}{$cep}");
        return json_decode($response->getBody(), true);
    }
}
