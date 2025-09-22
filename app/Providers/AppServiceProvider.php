<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 🔹 ADD THIS LINE to import Carbon
use Carbon\Carbon;

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
        // 🔹 ADD THIS LINE to set the locale to Thai
        Carbon::setLocale('th');
    }
}