<?php

namespace App\Providers;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-access', function (User $user) {
            return $user->admin===0;
        });
        
        Gate::define('douanier-access', function (User $user) {
            return $user->admin===1;
        });

        Gate::define('impot-access', function (User $user) {
            return $user->admin === 2;
        });

        Gate::define('servicemine-access', function (User $user) {
            return $user->admin===3;
        });
        
        
        Gate::define('client-access', function (User $user) {
            return $user->admin === 4;
        });
        
        Gate::define('duc-access', function (User $user) {
            return $user->admin === 5;
        });
    }
}
