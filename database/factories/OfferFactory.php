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
        $all_locations = $this->csvToArray(public_path('locations_list.txt'));
        $faker = faker::create();
        $start_date_raw = $faker->dateTimeBetween('now', '+2 years');
        $start_date_m_Y = $start_date_raw->format('F Y');
        $start_date = $start_date_raw->format('Y-m-d');
        $end_date_bound = date('Y-m-d', strtotime($start_date. ' + 3 weeks'));
        $end_date = $faker->dateTimeBetween($start_date, $end_date_bound)->format('Y-m-d');
        $diff_days = $this->diff_dates($end_date,$start_date);
        if($diff_days == 0){
            $diff_days = 1;
        }
        $cnt = $diff_days;
        $location_indexes = [];
        $days = "";
        $locations = [];
        
        while($cnt>0){
            $days_tmp = $faker->numberBetween(1,$cnt);
            $days .= strval($days_tmp) . ",";
            $cnt -= $days_tmp;
        }
        $all_cities = "";
        $all_states = "";
        $all_continents = "";
        $days_array=explode(',',$days);
        for($i=0;$i<count($days_array)-1;$i++){
            array_push($location_indexes, $faker->numberBetween(0,89));
            array_push($locations, $all_locations[$location_indexes[$i]]);
            $all_cities .= $all_locations[$location_indexes[$i]]['city'] . ",";
            $all_states .= $all_locations[$location_indexes[$i]]['state'] . ",";
            $all_continents .= $all_locations[$location_indexes[$i]]['continent'] . ",";
            
        }
        
        $location_dominant = $this->find_dominant($days_array, $locations );
        $transport_type = $faker->randomElement(['Bus', 'Airplane', 'Ship','Train', 'Individual']);
        return [
           
            
                'name' => $location_dominant['city'] . " $start_date_m_Y ." . $faker->words(10, true),
                'transport_price' => $faker->numberBetween(100, 3000),
                'transport_type' => $transport_type,
                'price_adult' => $faker->numberBetween(10, 1000),
                'price_child' => $faker->numberBetween(10, 500),
                'start_date' => $start_date,
                'end_date' => $end_date,
                'location_city' => $all_cities,
                'location_state' => $all_states,
                'location_continent' =>  $all_continents,
                'program' => $this->program_gen($diff_days,$faker,$transport_type),
                'note' => $faker->sentence(5),
                'img' => $this->select_picture($location_dominant['city']),
                'days' => $days,
                'is_active' => "1",
                'created_at' => now(),
                'updated_at' => now()
            ];
        
    }

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
        if($transport_type == "Airplane"){
            $result = "Departure from airport: " .$faker->dateTimeThisCentury()->format('H:i'). "\n\n";
        }else{
            $result = "Departure from station: ". $faker->dateTimeThisCentury()->format('H:i'). "\n\n";
        }
        
        for($i=1;$i<$num_days+1;$i++){
            $text = $faker->paragraph(2);
            $result .= "Day $i \n Program: $text \n\n";
        }
        $result .= "\n";

        $result .= "Return: " . $faker->randomElement(['morning', 'afternoon', 'evening','night']). " hours \n";
        return $result;
    }

    public function diff_dates($date1, $date2){
        $diff = strtotime($date2) - strtotime($date1);
        return (int)abs(round($diff / 86400));

    }

    public function select_picture($location){
        $files = glob(public_path('cities_pics/*'));
        $location = preg_replace("/[^a-zA-Z]/", "", $location);
        $location = strtolower($location);
        foreach($files as $file){
            $file_check = basename($file);
            $file_check = preg_replace('*_*', '', $file_check);
            $file_check = strtolower($file_check);
            $file_check = pathinfo($file_check, PATHINFO_FILENAME);
            if($location == $file_check){
                return basename($file);
            }
            else{
                continue;
            }



        }
    }

    public function find_dominant($days_array, $cities_array){

        $maxVal = max($days_array);
        $maxKey = array_search($maxVal, $days_array);
        
        $city_for_pic = $cities_array[$maxKey];
        
        
        return $city_for_pic;
        

}
}
