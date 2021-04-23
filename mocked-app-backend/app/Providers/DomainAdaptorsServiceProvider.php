<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Infrastructure\Auth\JwtAuthManager;
use Infrastructure\Represntation\JsonSessionRepresnter;
use Infrastructure\Represntation\JsonUserRepresnter;
use Infrastructure\Validation\LaravelValidatorAdaptor;
use Mocked\Contracts\Represntation\UserRepresnterInterface;
use Mocked\Domain\Contracts\Auth\AuthManagerInterface;
use Mocked\Domain\Contracts\Represntation\SessionRepresntationInterface;
use Mocked\Domain\Contracts\Validation\UserValidatorInterface;

class DomainAdaptorsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserValidatorInterface::class,function () {
            return new LaravelValidatorAdaptor(new Validator);
        });

        $this->app->singleton(AuthManagerInterface::class,function () {
            return new JwtAuthManager(new Auth);
        });

        $this->app->singleton(UserRepresnterInterface::class,function ()
        {
            return new JsonUserRepresnter(new Response);
        });

        $this->app->singleton(SessionRepresntationInterface::class,function ()
        {
            return new JsonSessionRepresnter(new Response);
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
