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
        // \App\Models\User::factory(10)->create();
        // $files = glob(public_path('accommodation_pics/*'));
        // dd($files[array_rand($files)]);
        \App\Models\Accommodation::factory(1)->afterCreating(function($accommodation){
            for($i=0;$i<6;$i++){
                $files = glob(public_path('accommodation_pics/*'));
                AccommodationPicture::create(['accommodation_id'=>$accommodation->id, 'img_path' => basename($files[array_rand($files)])]);
            }
        })->create();

        \App\Models\Offer::factory(10)->afterCreating(function ($offer) {
            // dd($offer);
            $offer->accommodations()->attach(\App\Models\Accommodation::inRandomOrder()->first()->id);
        })->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
