<?php

namespace App\Domain\Address\Providers;

use App\Domain\Address\Adapters\ViaCep\ViaCepAdapter;
use App\Domain\Address\Contracts\AddressContractAdapter;
use App\Support\Core\Providers\LaravelDomainServiceProvider;

class AddressDomainServiceProvider extends LaravelDomainServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(AddressContractAdapter::class, ViaCepAdapter::class);
    }
}
