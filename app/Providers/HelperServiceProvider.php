<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Helper;

class HelperServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Helper', function ($app) {
            return new Helper();
        });
    }
}
