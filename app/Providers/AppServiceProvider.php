<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
public function boot()
{
    Blade::if('admin', function () {
        return auth()->check() && auth()->user()->name === 'admin' || auth()->check() && auth()->user()->name === 'moderateur';
    });

    Blade::if('adminOrOwner', function ($id) {
        return auth()->check() && (auth()->id() === $id || auth()->user()->role === 'admin');
    });
}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
