<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, Init {
        Init::refreshInMemoryDatabase insteadof RefreshDatabase;
    }

    /**
     * Authentification.
     *
     * @return void
     */
    protected function auth($id) 
    {
        $user = User::find($id);

        $this->actingAs($user);
    }
}