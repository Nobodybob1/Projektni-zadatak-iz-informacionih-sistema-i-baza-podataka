<?php

namespace Tests\Feature;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OffersTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_offers_doesnt_exist()
    {
        $response = $this->get('/packages');

        $response->assertStatus(200);
        $response->assertSee('No offers found');
    }

    public function test_offers_exist()
    {
        $offer = Offer::create([
            'name' => 'Kragujevac February 2023',
            'transport_price' => 100,
            'transport_type' => 'Bus',
            'price_adult' => '100',
            'price_child' => '50',
            'start_date' => '2023-02-11',
            'end_date' => '2023-02-20',
            'location_city' => 'Kragujevac',
            'location_state' => 'Serbia',
            'location_continent' => 'Europe',
            'program' => 'programtest',
            'note' => 'notetest',
            'days' => '9'
        ]);

        $response = $this->get('/packages');

        $response->assertStatus(200);
        $response->assertDontSee('No offers found');
        $response->assertViewHas('offers', function($collection) use ($offer) {
            return $collection->contains($offer);
        });
    }

    public function test_default_pagination_is_working() {
        session()->forget('perPage');
        $offers = Offer::factory(51)->create();
        $lastOffer = $offers->last();

        $response = $this->get('/packages');

        $response->assertStatus(200);
        $response->assertViewHas('offers', function ($collection) use ($lastOffer) {
            return (count($collection) == 50);
        });
    }

    public function test_offer_created_successfully() {
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]); 

        //$token = csrf_token();
        $offer = [
            'name' => 'Kragujevac February 2023',
            'transport_price' => 100,
            'transport_type' => 'Bus',
            'price_adult' => '100',
            'price_child' => '50',
            'start_date' => '2023-02-11',
            'end_date' => '2023-02-20',
            'location_city' => 'Kragujevac',
            'location_state' => 'Serbia',
            'location_continent' => 'Europe',
            'program' => 'programtest',
            'note' => 'notetest',
            'days' => '9'
        ];

        //$response = $this->withSession(['_token' => csrf_token()])->post('/creating/offer', $offer);
        

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/creating/offer', $offer);

        $response->assertStatus(200);
        $response->assertViewIs('add_accommodation_to_offer');
        $this->assertDatabaseHas('offers', [
            'name' => $response->original['offer']['name'],
        ]);

        $lastOffer = Offer::latest()->first();
        $this->assertEquals($offer['name'], $lastOffer->name);
    }

    public function test_offer_edit_contains_correct_values() {
        $offer = Offer::factory()->create();
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]); 

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/admin/update/'. $offer->id);

        $response->assertStatus(200);
        $response->assertSee('value="'. $offer->name .'"', false); //false sluzi da bi prepoznao navodnike
    }

    public function test_offer_update_validation_error_redirects_back_to_form() {
        $offer = Offer::factory()->create();
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]); 

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/admin/updating/'. $offer->id, [
            'name' => '',
        ]);

        $response->assertStatus(302);
        $response->assertInvalid(['name']);
    }

    public function test_offer_delete_successful() {
        $offer = Offer::factory()->create();
        $user = User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => bcrypt('12345678'),
        ]); 

        $response = $this->actingAs($user)->withSession(['_token' => csrf_token()])->post('/admin/delete/offer', ['delete' => $offer->id]);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('offers', $offer->toArray());
        $this->assertDatabaseCount('offers', 0);
    }
}
