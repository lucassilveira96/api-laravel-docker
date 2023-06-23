<?php

namespace App\Services\Cep;

/**
 * Interface CepServiceInterface
 */
interface CepServiceInterface
{
    /**
     * Get CEP data from an external service.
     *
     * @param  string  $cep The CEP to retrieve data for.
     * @return array|null The CEP data as an associative array or null if the data is not found.
     */
    public function getCepData(string $cep): ?array;
}
