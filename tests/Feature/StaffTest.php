<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaffTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

     public function test_admin_can_access_register_new_staff_page() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)->get('/register');

        $response->assertStatus(200);
     }

     public function test_admin_can_register_new_staff() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]);
        $staff = [
            'name' => 'test2',
            'username' => 'test2',
            'password' => '12345678',
        ];

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/register_user', $staff);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/index');
        
        $this->assertDatabaseHas('users', [
            'name' => $staff['name']
        ]);

        $lastStaff = User::latest()->get()->toArray();
        $this->assertEquals($staff['name'], $lastStaff[1]["name"]);
     }

     public function test_user_edit_contains_correct_values() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]); 

        $staff = User::create([
            'name' => 'test2',
            'username' => 'test2',
            'password' => bcrypt('12345678'),
        ]); 

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/admin/users/update/'. $staff->id);

        $response->assertStatus(200);
        $response->assertSee('value="'. $staff->name .'"', false); //false sluzi da bi prepoznao navodnike
    }

    public function test_staff_update_validation_error_redirects_back_to_form() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]); 
        $staff = User::create([
            'name' => 'test2',
            'username' => 'test2',
            'password' => bcrypt('12345678'),
        ]); 

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/admin/users/updating/'. $staff->id, [
            'name' => '',
        ]);

        $response->assertStatus(302);
        $response->assertInvalid(['name']);
    }

    public function test_staff_delete_successful() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]); 
        $staff = User::create([
            'name' => 'test2',
            'username' => 'test2',
            'password' => bcrypt('12345678'),
        ]); 

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/admin/delete/user', ['delete' => $staff->id]);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', $staff->toArray());
        $this->assertDatabaseCount('users', 1);
    }
}
