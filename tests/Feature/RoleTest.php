<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogInTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_is_working_for_staff() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]);

        $response = $this->actingAs($user)->get('/admin/index');
        
        $response->assertStatus(200);
        $response->assertSee('Reservations');
    }

    public function test_staff_is_not_seeing_staff_button() {
        $user = User::create([
            'name' => 'test2',
            'username' => 'test2',
            'password' => bcrypt('12345678'),
        ]);
        $response = $this->actingAs($user)->get('/admin/index');
        
        $response->assertStatus(200);
        $response->assertDontSee('Staff');
    }

    public function test_login_is_working_for_admin() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)->get('/admin/index');
        
        $response->assertStatus(200);
        $response->assertSee('Staff');
    }

    public function test_staff_can_access_create_offer_page() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]);

        $response = $this->actingAs($user)->get('/create/offer');
        
        $response->assertStatus(200);
    }

    public function test_admin_can_access_add_staff_page() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)->get('/staff');
        
        $response->assertStatus(200);
    }

    public function test_staff_cant_access_add_staff_page() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]);

        $response = $this->actingAs($user)->get('/staff');
        
        $response->assertStatus(302); //302 zato sto redirectuje ako nemas pristup
    }
}
