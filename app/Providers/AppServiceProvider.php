<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\Category;

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
        return auth()->check() && (auth()->id() === $id || auth()->id() === 4);
    });



    if(request()->server("SCRIPT_NAME") !== 'artisan') {
        view ()->share('categories', Category::all());
    }
    AbstractPaginator::defaultView("pagination::bootstrap-4");
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
