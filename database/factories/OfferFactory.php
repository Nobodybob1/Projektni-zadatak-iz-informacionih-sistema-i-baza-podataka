<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;
use App\Models\Accommodation;
use App\Models\Offer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        
        $faker = faker::create();
        $start_date_raw = $faker->dateTimeBetween('now', '+2 years');
        $start_date_m_Y = $start_date_raw->format('F Y');
        $start_date = $start_date_raw->format('Y-m-d');
        $end_date_bound = date('Y-m-d', strtotime($start_date. ' + 3 weeks'));
        $end_date = $faker->dateTimeBetween($start_date, $end_date_bound)->format('Y-m-d');
        $diff_days = $this->diff_dates($end_date,$start_date);
        $location_index = $faker->numberBetween(0,89);
        $location = $this->csvToArray(public_path('locations_list.txt'))[$location_index];
        $city = $location['city'];
        $transport_type = $faker->randomElement(['Bus', 'Airplane', 'Ship','Train', 'Individual']);
        return [
           
            
                'name' => "$city $start_date_m_Y ." . $faker->name,
                'transport_price' => $faker->numberBetween(100, 3000),
                'transport_type' => $transport_type,
                'price_adult' => $faker->numberBetween(10, 1000),
                'price_child' => $faker->numberBetween(10, 500),
                'start_date' => $start_date,
                'end_date' => $end_date,
                'location_city' => $location['city'],
                'location_state' => $location['state'],
                'location_continent' =>  $location['continent'],
                'program' => $this->program_gen($diff_days,$faker,$transport_type), //ovde treba da se doda logika za svaki dan da pise program
                'note' => $faker->sentence(5),
                // 'accommodation_id' => function () {
                //     return Accommodation::inRandomOrder()->first()->id;
                // }
            ];
        
    }

//     public function afterCreating($offer)
// {   
//     $offer->accommodations()->attach(Accommodation::inRandomOrder()->first()->id);
// }

    function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}

    public function program_gen($num_days, $faker, $transport_type){
        //$faker = faker::create();
        if($transport_type == "Airplane"){
            $result = "Leaving from airport at " .$faker->dateTimeThisCentury()->format('H:i'). "\n";
        }else{
            $result = "Leaving from station at ". $faker->dateTimeThisCentury()->format('H:i'). "\n";
        }
        
        for($i=1;$i<$num_days+1;$i++){
            $text = $faker->paragraph(2);
            $result .= "Program for day $i: $text \n";
        }

        $result .= "Arriving back at " . $faker->randomElement(['morning', 'afternoon', 'evening','night']). " hours \n";
        return $result;
    }

    public function diff_dates($date1, $date2){
        $diff = strtotime($date2) - strtotime($date1);
        return (int)abs(round($diff / 86400));

    }
}
