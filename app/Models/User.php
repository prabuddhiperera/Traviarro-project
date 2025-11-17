<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'country',
        'number_of_adults',
        'number_of_children',
        'type',       // 'user' or 'admin'
        'notes',
    ];

    protected $hidden = [
        // password fields removed since not in schema
        'remember_token',
    ];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function tripPlans() {
        return $this->hasMany(TripPlan::class);
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
