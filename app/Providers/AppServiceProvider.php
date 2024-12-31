<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register application services here, if needed.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Gate::define('admin', function (?User $user) {
            return $user?->role === 'admin';
        });

        Gate::define('user', function (?User $user) {
            return $user?->role === 'user';
        });

        $this->registerRoleBladeDirectives(['admin', 'user']);
    }

    /**
     * Register Blade directives for roles.
     */
    protected function registerRoleBladeDirectives(array $roles): void
    {
        foreach ($roles as $role) {
            Blade::if($role, function () use ($role) {
                return request()->user()?->can($role);
            });
        }
    }
}
