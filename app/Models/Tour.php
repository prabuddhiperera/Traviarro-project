<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['admin_id', 'destination_id', 'title', 'price', 'duration', 'description', 'image'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function days() 
    {
        return $this->hasMany(TourDay::class);
    }
}
