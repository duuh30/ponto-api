<?php

namespace App\Domain\Address\Adapters\ViaCep;

use App\Domain\Address\Contracts\AddressContractAdapter;
use App\Domain\Address\Data\AddressData;
use App\Support\Core\AbstractResult\AbstractResult;
use App\Support\Core\AbstractResult\Failure;
use App\Support\Core\AbstractResult\Success;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use Exception;

class ViaCepAdapter implements AddressContractAdapter
{
    public function makeHttpClient(): PendingRequest
    {
        return Http::acceptJson()
            ->contentType('application/json')
            ->baseUrl('https://viacep.com.br/ws/');
    }

    /**
     * @throws ConnectionException
     */
    public function searchByZipCode(string $zipCode): AbstractResult
    {
        $viaCepClient = $this->makeHttpClient();
        $response = $viaCepClient->get($zipCode . "/json");

        if ($response->failed()) {
            return new Failure(
                $response->toException()
            );
        }

        $responseJson = $response->json();

        try {
            $addressData = AddressData::from([
                'zip_code' => data_get($responseJson, 'cep'),
                'state' => data_get($responseJson, 'uf'),
                'city' => data_get($responseJson, 'localidade'),
                'neighborhood' => data_get($responseJson, 'bairro'),
                'street' => data_get($responseJson, 'logradouro'),
            ]);

            return new Success($addressData);
        } catch (Exception $exception) {
            return new Failure($exception);
        }
    }
}
