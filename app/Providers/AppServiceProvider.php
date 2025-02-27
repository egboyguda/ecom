<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        //gate para macheck if the user
        //is admin pwedi mo n ma call
        Gate::define('admin-access',function(User $user){
            return $user->hasRole('admin');
        });
        //dd check if what user 
        //directive kunwarei @role admin kun
        //admin la sun maka imud
        Blade::if('role',fn($expression)=>Auth::user()->hasAnyRole([$expression]));

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::preventLazyLoading();
    }
}
