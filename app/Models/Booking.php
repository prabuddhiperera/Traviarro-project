<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'customer_name',
        'phone',
        'from_location',
        'to_location',
        'booking_date',
        'travel_date',
        'travel_time',
        'number_of_people',
        'type',
        'total_price',
        'revenue',
        'profit',
        'amount',           // existing amount
        'status',
        'vehicle_type',
        'itinerary',

        // NEW FIELDS
        'reservation_id',
        'reservation_status',
        'pickup_location',
        'dropoff_location',
        'hotel_name',
        'flight_number',
        'baby_seat',
        'commission',
        'payout',
        'payment_status',
        'payment_method',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    // Automatically calculate payout whenever total_price or commission changes
    public static function boot()
    {
        parent::boot();

        static::saving(function ($booking) {
            if (isset($booking->total_price) && isset($booking->commission)) {
                $booking->payout = $booking->total_price - $booking->commission;
            }
        });

        // Auto-generate Reservation ID if empty
        static::creating(function ($booking) {
            if (empty($booking->reservation_id)) {
                $last = self::latest('id')->first();
                $nextId = $last ? $last->id + 1 : 1;
                $booking->reservation_id = sprintf("#%04d", $nextId);
            }
        });
    }
}
