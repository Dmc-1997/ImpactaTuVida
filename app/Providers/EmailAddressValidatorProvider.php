<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\EmailAddressValidator;

class EmailAddressValidatorProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\EmailAddressValidator', function ($app) {
            return new EmailAddressValidator();
        });
    }
}
