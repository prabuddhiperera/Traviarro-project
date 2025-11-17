<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'places_to_visit'; // match your migration

    protected $fillable = ['destination_id', 'name', 'image'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
