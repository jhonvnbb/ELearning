<?php

namespace App\Providers;

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

    public static function redirectTo()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return '/admin/dashboard';
        } elseif ($user->role === 'guru') {
            return '/guru/dashboard';
        } else {
            return '/dashboard';
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
