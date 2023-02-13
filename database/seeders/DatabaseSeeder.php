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
        $batch_size = 1000;
        $total_offers = 60000;
        
        \App\Models\Accommodation::factory(90)->afterCreating(function($accommodation){
            $count = rand(1,6);
            
            for($i=0;$i<$count;$i++){
                $files = glob(public_path('accommodation_pics/*'));
                AccommodationPicture::create(['accommodation_id'=>$accommodation->id, 'img_path' => basename($files[array_rand($files)])]);
            }
        })->create();
        for($i=0; $i<$total_offers; $i+=$batch_size){
            $offers = \App\Models\Offer::factory($batch_size)->make()->toArray();
            for($j=0; $j<$batch_size; $j++){
                if($i+$j < 834){ // 166 * 60 = 9960 neaktivnih ponuda
                    $offers[$j]['is_active'] = "1";  //aktivni
                }else{
                    $offers[$j]['is_active'] = "0";  //neaktivni
                }
                $offers[$j]['created_at'] = now();
                $offers[$j]['updated_at'] = now();
            }
            \App\Models\Offer::insert($offers);
        }

        $offers = \App\Models\Offer::all();
        foreach($offers as $offer){
            $num_cities = count(explode(',', $offer->days)) - 1;
            $accommodation_ids = \App\Models\Accommodation::inRandomOrder()
            ->limit($num_cities)
            ->pluck('id')
            ->toArray();
            $offer->accommodations()->attach($accommodation_ids);

                // $accommodation_ids = \App\Models\Accommodation::inRandomOrder()->pluck('id')->toArray();
                // $num_cities = count(explode(',', $offer->days)) - 1;
                // shuffle($accommodation_ids);
                // for($i=0;$i<$num_cities;$i++){
                //     $offer->accommodations()->attach($accommodation_ids[$i]);
                // }
        }

        

        \App\Models\User::create(["name"=> "admin","username"=>"admin","password"=>bcrypt("admin"),"is_admin"=>"1"]);
        \App\Models\User::create(["name"=> "done","username"=>"done","password"=>bcrypt("done"),"is_admin"=>"1"]);
        // $this->call(NotActiveOffersSeeder::class);
        
    }


}
