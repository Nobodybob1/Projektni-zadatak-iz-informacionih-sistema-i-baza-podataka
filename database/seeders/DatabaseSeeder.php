<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccommodationPicture;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Accommodation::factory(1)->afterCreating(function($accommodation){
            for($i=0;$i<6;$i++){
                $files = glob(public_path('accommodation_pics/*'));
                AccommodationPicture::create(['accommodation_id'=>$accommodation->id, 'img_path' => basename($files[array_rand($files)])]);
            }
        })->create();

        \App\Models\Offer::factory(100)->afterCreating(function ($offer) {
            $offer->accommodations()->attach(\App\Models\Accommodation::inRandomOrder()->first()->id);
            $offer->update(['is_active'=>"1"]);  //aktivni
        })->create();

        \App\Models\Offer::factory(10)->afterCreating(function ($offer) {
            $offer->accommodations()->attach(\App\Models\Accommodation::inRandomOrder()->first()->id);
            $offer->update(['is_active'=>"0"]);  //neaktivni
        })->create();
    }
}
