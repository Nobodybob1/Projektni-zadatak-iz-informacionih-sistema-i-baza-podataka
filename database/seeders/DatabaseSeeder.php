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
        
        \App\Models\Accommodation::factory(100)->afterCreating(function($accommodation){
            $count = rand(1,6);
            
            for($i=0;$i<$count;$i++){
                $files = glob(public_path('accommodation_pics/*'));
                AccommodationPicture::create(['accommodation_id'=>$accommodation->id, 'img_path' => basename($files[array_rand($files)])]);
            }
        })->create();

        \App\Models\Offer::factory(500)->afterCreating(function ($offer) {
            $num_cities = count(explode(',', $offer->days)) - 1;
            for($i=0;$i<$num_cities;$i++){
                $offer->accommodations()->attach(\App\Models\Accommodation::inRandomOrder()->first()->id);
            }
            $offer->update(['is_active'=>"1"]);  //aktivni
        })->create();

        \App\Models\Offer::factory(50)->afterCreating(function ($offer) {
            $num_cities = count(explode(',', $offer->days)) - 1;
            for($i=0;$i<$num_cities;$i++){
                $offer->accommodations()->attach(\App\Models\Accommodation::inRandomOrder()->first()->id);
            }
            $offer->update(['is_active'=>"0"]);  //neaktivni
        })->create();

        \App\Models\User::create(["name"=> "admin","username"=>"admin","password"=>bcrypt("admin"),"is_admin"=>"1"]);

        \App\Models\User::create(["name"=> "done","username"=>"done","password"=>bcrypt("done"),"is_admin"=>"1"]);
        
    }
}
