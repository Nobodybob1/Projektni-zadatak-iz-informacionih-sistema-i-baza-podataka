<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class StaffTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form_exists() {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    // public function test_delete_staff() {
    //     $user = User::factory()->count(1);

    //     $user = User::latest()->first();

    //     if($user) {
    //         $user->delete();
    //     }

    //     $this->assertTrue(true);
    // }


    // Pravi problem verovatno jer u kontroleru samo admin moze da ubaci usera
    // public function test_it_stores_new_staffs() {
    //     $response = $this->post('/register_user', [
    //         'name' => 'test',
    //         'username' => 'test',
    //         'password' => '12345678',
    //         'is_admin' => '0',
    //     ]);

    //     $response->assertRedirect('/admin/index');
    // }

    public function test_users_table() {
        $this->assertDatabaseHas('users', [
            'name' => 'Desko',
        ]);
    }
}
