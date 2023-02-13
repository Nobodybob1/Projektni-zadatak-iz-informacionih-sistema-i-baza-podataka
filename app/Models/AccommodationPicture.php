<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationPicture extends Model
{
    use HasFactory;


    protected $table = 'accomodationpictures';
    protected $fillable = [
        'img_path',
        'accommodation_id'
    ];

    public function accommodation() {
        return $this->belongsTo('App\Models\Accommodation', 'accommodation_id');
    }
}
