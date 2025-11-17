<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Admin manages users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Admin manages destinations, tours, services, bookings, trip plans
    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function tripPlans()
    {
        return $this->hasMany(TripPlan::class);
    }
}
