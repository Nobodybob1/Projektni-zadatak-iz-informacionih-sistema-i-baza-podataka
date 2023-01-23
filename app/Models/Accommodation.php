<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'room_bed',
        'rating',
        'internet',
        'tv',
        'ac',
        'fridge'


    ];

    // public function offers(){
    //     return $this->belongsToMany('App\Models\Offer');
    // }
}
