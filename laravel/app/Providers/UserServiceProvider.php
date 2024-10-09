<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Đăng ký UserService và UserRepository
        $this->app->singleton(
            'App\Services\User\UserServiceInterface',
            'App\Services\User\UserService'
        );

        $this->app->singleton(
            'App\Repositories\User\UserRepositoryInterface',
            'App\Repositories\User\UserRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
