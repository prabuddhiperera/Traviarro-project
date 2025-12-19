<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('pickup_location')->nullable()->after('description');
            $table->string('dropoff_location')->nullable()->after('pickup_location');
            $table->date('travel_date')->nullable()->after('dropoff_location');
            $table->time('travel_time')->nullable()->after('travel_date');
            $table->string('vehicle_type')->nullable()->after('travel_time');
            $table->string('flight_number')->nullable()->after('vehicle_type');
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn([
                'pickup_location', 
                'dropoff_location', 
                'travel_date', 
                'travel_time', 
                'vehicle_type', 
                'flight_number'
            ]);
        });
    }
};
