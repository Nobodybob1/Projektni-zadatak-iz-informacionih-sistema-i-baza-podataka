<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;


    protected $fillable = [
    
        'name',
        'transport_price',
        'transport_type',
        'price_adult',
        'price_child',
        'start_date',
        'end_date',
        'location_city',
        'location_state',
        'location_continent',
        'program',
        'note',
        'img'

    ];

    public function diff_dates($date1, $date2){
        $diff = strtotime($date2) - strtotime($date1);
        return (int)abs(round($diff / 86400));

    }

    public function format_date($date)
    {
        
        $day_month = Carbon::createFromFormat('Y-m-d', $date)->format('d/m');
        $year = Carbon::createFromFormat('Y-m-d', $date)->format('Y');
        return [$day_month, $year];
    }

    public function date_str_to_nice($date){

        return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }
    

    public function accommodations(){


        return $this->belongsToMany('App\Models\Accommodation');
    }



    public function reservations() {
        return $this->hasMany('App\Models\Reservation', 'offer_id');
    }


}
