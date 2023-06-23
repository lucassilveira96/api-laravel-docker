<?php

namespace Tests\Unit\Services\Cep;

use App\Services\Cep\CepService;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as ResponseAlias;
use Tests\TestCase;

class CepServiceTest extends TestCase
{
    /**
     * Test the getCepData method of CepService.
     *
     * It should retrieve and parse the response from the CEP search API.
     *
     * @return void
     */
    public function testGetCepData()
    {
        $url = env('URL_BUSCA_CEP');
        $cep = '95580000';

        // Simulate the response from the CEP search API
        $responseBody = [
            'cep' => '95580000',
            'state' => 'RS',
            'city' => 'Três Cachoeiras',
            'service' => 'correios',
        ];
        $response = new Response(ResponseAlias::HTTP_OK, [], json_encode($responseBody));

        // Create a mock handler and push the response to it
        $mockHandler = new MockHandler([$response]);

        // Create a Guzzle client with the mock handler
        $client = new Client(['handler' => HandlerStack::create($mockHandler)]);

        // Create an instance of the CepService with the mock client
        $cepService = new CepService($client);

        // Call the tested method
        $result = $cepService->getCepData('95580000');

        // Verify if the result matches the expected data
        $this->assertEquals($responseBody, $result);
    }
}
