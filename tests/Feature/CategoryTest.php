<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    // Test pour création de catégories
    public function testAddCategory()
    {
        $this->auth(4);
    
        $this->get('/category/create')
            ->assertSee('Name');
    
        $response = $this->post('/category', [
            'name' => 'Une catégorie',
        ]);
    
        $this->assertDatabaseHas('categories', [
            'name' => 'Une catégorie',
            'slug' => 'une-categorie',
        ]);
    
        $response->assertStatus(302)
            ->assertHeader('Location', url('/'));
    }



    public function testAddCategoryFail()
{
    $this->auth(1);
    // Required
    $response = $this->post('/category');
    $response->assertSessionHasErrors('name');
    // Unique
    $response = $this->post('/category', [
        'name' => 'Maisons',
    ]);
    $response->assertSessionHasErrors('name');
    // Max length
    $response = $this->post('/category', [
        'name' => str_random(256),
    ]);
    $response->assertSessionHasErrors('name');
    // String
    $response = $this->post('/category', [
        'name' => 256,
    ]);
    $response->assertSessionHasErrors('name');
}


}