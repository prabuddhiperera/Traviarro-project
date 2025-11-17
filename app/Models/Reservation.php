<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
    'user_id', 'from_location', 'to_location', 'travel_date', 
    'travel_time', 'trip_type', 'vehicle_type', 'itinerary', 'price'
];

public function user() {
    return $this->belongsTo(User::class);
}

}
