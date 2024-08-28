<?php

namespace App\Domain\Address\Services;

use App\Domain\Address\Contracts\AddressContractAdapter;
use App\Domain\Address\Data\AddressData;
use App\Domain\Address\Exceptions\AddressSearchException;

readonly class AddressService
{
    public function __construct(
        public AddressContractAdapter $adapter
    ){}

    /**
     * Use the adapter to search address by zipCode
     *
     * @param string $zipCode
     * @return AddressData
     * @throws AddressSearchException
     */
    public function searchByZipCode(string $zipCode): AddressData
    {
        $searchAddressResult = $this->adapter->searchByZipCode(
            zipCode: $zipCode
        );

        if ($searchAddressResult->isFailure()) {
            throw AddressSearchException::unexpectedIntegrationError();
        }

        return $searchAddressResult->get();
    }
}
