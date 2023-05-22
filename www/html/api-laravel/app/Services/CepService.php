<?php

namespace App\Services;

use GuzzleHttp\Client;

class CepService
{
    public function getCepData($cep)
    {
        $url = env('URL_BUSCA_CEP');
        $client = new Client();
        $response = $client->request('GET', "{$url}{$cep}");
        return json_decode($response->getBody(), true);
    }
}
