<?php

namespace Tests\Feature;

use App\Models\Rule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User ;
class DashboardTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_must_be_auth_to_visit_dashboard()
    {
         $this->get('/admin')->assertRedirect(route('login.index'));
    }
    public function test_it_fails_if_auth_user_is_an_users()
    {
        $rule = Rule::factory()->user()->create([
            'id'=>3
        ]);

        $user = User::factory()->user()->create();

        $this->actingAs($user)->get('/admin')->assertStatus(200);
    }

    public function test_it_can_entered_if_admin()
    {
       $rule = Rule::factory()->admin()->create([
           'id'=>1
       ]);

        $admin = User::factory()->admin()->create();
        $this->actingAs($admin)->get('/admin')->assertStatus(200);
    }

    public function test_it_can_entered_if_moderator()
    {
        $rule = Rule::factory()->moderator()->create([
            'id'=>2
        ]);

        $moderator = User::factory()->moderator()->create();
        $this->actingAs($moderator)->get('/admin')->assertStatus(200);
    }


}
