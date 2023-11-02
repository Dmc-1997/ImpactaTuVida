<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Consult;

class ConsultServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Consult', function ($app) {
            return new Consult();
        });
    }
}
