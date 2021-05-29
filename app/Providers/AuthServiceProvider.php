<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\AdminPolicy;
use App\Policies\ContestsPolicy;
use App\Policies\UserPolicy;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('show', [AdminPolicy::class, 'show']);
        Gate::define('AdminOrManger', [AdminPolicy::class, 'AdminOrManger']);
        Gate::define('creat', [ContestsPolicy::class, 'creat']);
        Gate::define('Myprofile', [UserPolicy::class, 'Myprofile']);
        Gate::define('OrganizerOrAdmin', [ContestsPolicy::class, 'OrganizerOrAdmin']);
        Gate::define('IAmCompetitor', [ContestsPolicy::class, 'IAmCompetitor']);
        
    }
}
