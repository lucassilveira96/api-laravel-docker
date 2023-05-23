<?php

namespace App\Services\Cep;
interface CepServiceInterface
{
    /**
     * get one cep into external service
     * @param string $cep
     * @retuen array|null
     */
    public function getCepData(string $cep) : ?array;

}
