<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'category_id',
        'status',
        'image',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_service');
    }
}
