<?php

namespace App\Domain\Track\Providers;

use App\Support\Core\Providers\LaravelDomainServiceProvider;

class TrackDomainServiceProvider extends LaravelDomainServiceProvider
{
    public string $routesFromDir = __DIR__ . '/../../../Application/Track/Http/Routes/api.php';
}
