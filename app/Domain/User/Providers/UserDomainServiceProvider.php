<?php

namespace App\Domain\User\Providers;

use App\Domain\User\Models\User;
use App\Domain\User\Policies\UserPolicy;
use App\Support\Core\Providers\LaravelDomainServiceProvider;
use Illuminate\Support\Facades\Gate;

class UserDomainServiceProvider extends LaravelDomainServiceProvider
{
    public string $routesFromDir = __DIR__ . '/../../../Application/User/Http/Routes/api.php';

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);

        parent::boot();
    }
}
