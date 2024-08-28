<?php

namespace App\Domain\User\Providers;

use App\Support\Core\Providers\LaravelDomainServiceProvider;

class UserDomainServiceProvider extends LaravelDomainServiceProvider
{
    public string $routesFromDir = __DIR__ . '/../../../Application/User/Routes/api.php';
}
