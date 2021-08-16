<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('account_create', fn(User $user) => $user->is_admin);
        Gate::define('account_edit', fn(User $user) => $user->is_admin);
        Gate::define('admin_only', fn(User $user) => $user->is_admin);
        Gate::define('user_only', fn(User $user) => $user->is_admin == false);
        //
    }
}
