<?php

namespace App\Domain\Address\Data;

use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public function __construct(
        public readonly string $zip_code,
        public readonly string $state,
        public readonly string $city,
        public readonly string $neighborhood,
        public readonly string $street,
    ){}
}
