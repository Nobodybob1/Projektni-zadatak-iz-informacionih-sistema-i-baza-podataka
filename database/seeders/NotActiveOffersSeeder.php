<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotActiveOffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Offer::factory(10000)->afterCreating(function ($offer) {
            $num_cities = count(explode(',', $offer->days)) - 1;
            for($i=0;$i<$num_cities;$i++){
                $offer->accommodations()->attach(\App\Models\Accommodation::inRandomOrder()->first()->id);
            }
            $offer->update(['is_active'=>"0"]);  //neaktivni
        })->create();

        \App\Models\User::create(["name"=> "done","username"=>"done","password"=>bcrypt("done"),"is_admin"=>"1"]);

        
    }
}
