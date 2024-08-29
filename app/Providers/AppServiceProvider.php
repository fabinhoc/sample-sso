<?php

namespace App\Providers;

use App\Listeners\SetApplicationIdInSession;
use App\Listeners\SetTenantIdInSession;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
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
        // Event::listen(
        //     Login::class,
        //     SetTenantIdInSession::class
        // );
        // Event::listen(
        //     Login::class,
        //     SetApplicationIdInSession::class
        // );

        // Gate::policy(User::class, UserPolicy::class);
        // Gate::policy(Role::class, RolePolicy::class);
    }
}
