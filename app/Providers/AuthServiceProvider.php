<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Log::info("Test de Consola #2"); 
        Log::info(app()->version());
/*
        Artisan::call('route:list');
        Log::info(Artisan::output());*/

        session(['login_time' => now()]);
        Gate::define('accessAdminpanel', function($user) {
            return $user->role(['superadmin', 'admin']);
        });

        Gate::define('accessBusinesspanel', function($user) {
            return $user->role('business');
        });

        Gate::define('accessMemberpanel', function($user) {
            return $user->role(['superadmin', 'admin', 'business', 'member']);
        });
    }
}
