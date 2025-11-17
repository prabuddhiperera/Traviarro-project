<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'admin_id',
        'name',
        'city',
        'description',
        'places_to_visit',
        'things_to_do',
        'image'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function tripPlans()
    {
        return $this->belongsToMany(TripPlan::class, 'tripplan_destination');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
