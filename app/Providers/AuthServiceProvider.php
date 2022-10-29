<?php

namespace App\Providers;

use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define(
            'user-has-permission-create-users', 
            [UserPolicy::class, 'userHasPermissionCreateUsers']
        );

        Gate::define(
            'user-can-create-post',
            [PostPolicy::class, 'hasPermissionCreate']
        );

        Gate::define(
            'user-can-edit-comment',
            [CommentPolicy::class, 'userCanEdit']
        );
    }
}
