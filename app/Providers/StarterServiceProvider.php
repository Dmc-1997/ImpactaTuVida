<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Starter;

class StarterServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Starter', function ($app) {
            return new Starter();
        });
    }
}
