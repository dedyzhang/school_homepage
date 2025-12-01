<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['layouts.main'], function ($view) {
            if (Auth::check()) {
                $account = Auth::user();
                $view->with('account', $account);
            }
        });

        Gate::define('admin', function () {
            return Auth::user()->access === "admin";
        });
        Gate::define('superadmin', function () {
            return Auth::user()->access === "superadmin";
        });
        Gate::define('siswa',function() {
            return Auth::user()->access === "siswa";
        });
    }
}
