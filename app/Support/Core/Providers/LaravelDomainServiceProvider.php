<?php

namespace App\Support\Core\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelDomainServiceProvider extends ServiceProvider
{
    /**
     * Load Routes from Dir
     *
     * @var string
     */
    public string $routesFromDir;

    /**
     * Register any application services.
     */
    public function register(): void
    {
       //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom($this->routesFromDir);
    }
}
