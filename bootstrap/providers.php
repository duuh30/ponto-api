<?php

use App\Domain\User\Providers\UserDomainServiceProvider;
use App\Domain\Address\Providers\AddressDomainServiceProvider;
use App\Domain\Track\Providers\TrackDomainServiceProvider;

return [
    UserDomainServiceProvider::class,
    AddressDomainServiceProvider::class,
    TrackDomainServiceProvider::class,
];
