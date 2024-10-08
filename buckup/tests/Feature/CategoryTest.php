<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    
    public function test_it_must_be_auth_to_show_categories_page()
    {
        $response = $this->get('/admin/categories');
         $response->assertRedirect(route('login.index'));
    }
}
