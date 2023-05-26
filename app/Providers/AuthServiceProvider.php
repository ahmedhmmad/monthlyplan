<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Car;
use App\Models\Permission;
use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Car::class => CarPolicy::class,
        Event::class => EventPolicy::class,
        School::class => SchoolPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        Gate::define('browse_admin', function (User $user) {
            return $user->hasPermission('browse_admin');
        });
        Gate::define('administrator', function (User $user) {
            return $user->hasPermission('administrator');
        });
        Gate::define('banned', function (User $user) {
            return $user->hasPermission('banned');
        });
    }
}
