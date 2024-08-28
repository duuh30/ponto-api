<?php

namespace App\Domain\Address\Contracts;

use App\Support\Core\AbstractResult\AbstractResult;

interface AddressContractAdapter
{
    public function searchByZipCode(string $zipCode): AbstractResult;
}
