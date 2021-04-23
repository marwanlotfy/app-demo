<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mocked\Domain\Contracts\Factories\UserFactoryInterface;
use Mocked\Domain\Users\UserFactory;

class DomainFactoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserFactoryInterface::class,function () {
            return new UserFactory;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
