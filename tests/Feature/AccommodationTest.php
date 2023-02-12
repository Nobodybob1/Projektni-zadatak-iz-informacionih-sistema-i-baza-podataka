<?php

namespace Tests\Feature;

use App\Models\Accommodation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccommodationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_default_pagination_is_working() {
        $accommodations = Accommodation::factory(21)->create();
        $lastItem = $accommodations->last();
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)->get('/admin/accommodation');

        $response->assertStatus(200);
        $response->assertDontSee($lastItem);
    }

    public function test_accommodation_created_successfully() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]); 

        $accommodation = [
            'name' => 'Hotel Nesto',
            'room_bed' => '1/3',
            'rating' => 5,
            'internet' => '1',
            'tv' => '1',
            'ac' => '1',
            'fridge' => '1',
        ];

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/creating/accommodation', $accommodation);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/index');
        $this->assertDatabaseHas('accommodations', [
            'name' => $accommodation['name'],
        ]);

        $lastItem = Accommodation::latest()->get()->toArray();
        $this->assertEquals($accommodation['name'], $lastItem[0]["name"]);
    }

    public function test_accommodation_delete_successful() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]); 
        $accommodation = Accommodation::factory()->create();

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/accommodation/delete', ['delete' => $accommodation->id]);

        $this->assertDatabaseMissing('accommodations', $accommodation->toArray());
    }
}
