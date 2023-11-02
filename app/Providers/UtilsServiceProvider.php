<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Utils;

class UtilsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\Utils', function ($app) {
            return new Utils();
        });
    }
}
