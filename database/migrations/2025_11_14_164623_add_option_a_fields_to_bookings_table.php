<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('reservation_id')->nullable()->after('id');
            $table->string('reservation_status')->default('Confirmed')->after('status');
            $table->string('pickup_location')->nullable()->after('from_location');
            $table->string('dropoff_location')->nullable()->after('to_location');
            $table->string('hotel_name')->nullable()->after('itinerary');
            $table->string('flight_number')->nullable()->after('vehicle_type');
            $table->enum('baby_seat', ['Yes','No'])->default('No')->after('flight_number');
            $table->decimal('commission', 10, 2)->default(0)->after('total_price');
            $table->decimal('payout', 10, 2)->default(0)->after('commission');
            $table->string('payment_status')->default('Unpaid')->after('payout');
            $table->string('payment_method')->nullable()->after('payment_status');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
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
                'payment_method'
            ]);
        });
    }
};
