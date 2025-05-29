<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
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
        // Check if timezone cookie is set
        $timezone = Cookie::get('timezone');

        // If timezone cookie is set, update the config timezone
        if ($timezone) {
            // Update the application timezone
            Config::set('app.timezone', $timezone);

            // Set the default PHP timezone
            date_default_timezone_set($timezone);

            // Optionally, you can set the Carbon timezone
            Carbon::now()->setTimezone($timezone);
        }
    }
}
