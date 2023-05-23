<?php

namespace App\Services\Cep;
interface CepServiceInterface
{
    public function getCepData($cep) : ?array;

}
