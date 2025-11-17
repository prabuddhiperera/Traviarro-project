<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'things_to_do'; // match your migration

    protected $fillable = ['destination_id', 'name', 'image'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
