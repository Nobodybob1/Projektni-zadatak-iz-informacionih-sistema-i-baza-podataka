<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'first_name',
        'last_name',
        'phone_no',
        'email',
        'payment_type',
        'num_adults',
        'num_child',
        'note',
        'offer_id',
        'is_approved',
    ];

    public function offer() {
        return $this->belongsTo('App\Models\Offer', 'offer_id');
    }
}
