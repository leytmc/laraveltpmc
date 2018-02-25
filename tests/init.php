<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use App\Models\Category;
use DatabaseMigrations;

trait Init
{
    /**
     * Refresh the in-memory database.
     *
     * @return void
     */
    protected function refreshInMemoryDatabase()
    {
        parent::setUp();
        //$this->artisan('migrate');
        Artisan::call('migrate');
        $this->seed();
        //$this->artisan('db:seed');
        // Artisan::call('db:seed');
        view ()->share ('categories', Category::all ()); 

        $this->app[Kernel::class]->setArtisan(null);
    }
}