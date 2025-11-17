<?php

// database/migrations/xxxx_create_reservations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // customer
            $table->string('from_location');
            $table->string('to_location');
            $table->date('travel_date');
            $table->time('travel_time');
            $table->enum('trip_type', ['One Way', 'Round Trip']);
            $table->string('vehicle_type');
            $table->text('itinerary')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('reservations');
    }
};
