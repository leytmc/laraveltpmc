<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function refreshInMemoryDatabase()
{
    $this->artisan('migrate');

    $this->app[Kernel::class]->setArtisan(null);
}



}
