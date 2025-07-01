<?php

namespace App\Providers;

use App\Http\Services\Auth\LoginService;
use App\Http\Services\Auth\LogoutService;
use App\Http\Services\Auth\RegisterService; 
use App\Http\Services\AuthService;
use App\Http\Services\Interfaces\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, function ($app) {
            return new AuthService(
                $app->make(LoginService::class),
                $app->make(RegisterService::class),
                $app->make(LogoutService::class),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
