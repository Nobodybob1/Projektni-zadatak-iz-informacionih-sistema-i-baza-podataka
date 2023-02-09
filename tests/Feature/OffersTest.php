<?php

namespace Tests\Feature;

use App\Models\Offer;
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
        ]);

        $response = $this->get('/packages');

        $response->assertStatus(200);
        $response->assertDontSee('No offers found');
        $response->assertViewHas('offers', function($collection) use ($offer) {
            return $collection->contains($offer);
        });
    }

    public function test_default_pagination_is_working() {
        $offers = Offer::factory(51)->create();
        $lastOffer = $offers->last();

        $response = $this->get('/packages');

        $response->assertStatus(200);
        $response->assertViewHas('offers', function ($collection) use ($lastOffer) {
            return !$collection->contains($lastOffer);
        });
    }
}
