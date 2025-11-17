<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripPlan extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'title', 'budget', 'start_date', 'end_date', 'notes'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'tripplan_destination');
    }
}
