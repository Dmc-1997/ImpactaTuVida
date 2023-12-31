<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\DigitalOcean;

class DigitalOceanServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\DigitalOcean', function ($app) {
            return new DigitalOcean();
        });
    }
}
