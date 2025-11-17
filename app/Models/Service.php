<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['admin_id', 'name', 'description', 'price', 'type'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_service');
    }
}
