<?php

use App\Domain\User\Providers\UserDomainServiceProvider;
use App\Domain\Address\Providers\AddressDomainServiceProvider;

return [
    UserDomainServiceProvider::class,
    AddressDomainServiceProvider::class
];
