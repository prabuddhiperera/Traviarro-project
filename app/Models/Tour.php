<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'destination_id',
        'price',
        'description',
        'image',
        'pickup_location',
        'dropoff_location',
        'travel_date',
        'travel_time',
        'vehicle_type',
        'flight_number',
    ];

    // Destination Relationship
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // Admin Relationship
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Booking Relationship (if you use bookings table)
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function days()
{
    return $this->hasMany(TourDay::class);
}

}
