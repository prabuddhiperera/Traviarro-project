<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            // User reference
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Service/Tour reference
            $table->foreignId('tour_id')->nullable()->constrained('services')->onDelete('cascade');

            // Booking info
            $table->string('customer_name');
            $table->string('phone');
            $table->string('from_location');
            $table->string('to_location');
            $table->date('booking_date');
            $table->date('travel_date');
            $table->time('travel_time');
            $table->integer('number_of_people')->default(1);

            // Trip type dynamically from services table
            $table->string('type');

            // Financials
            $table->decimal('total_price', 10, 2)->default(0);
            $table->decimal('revenue', 10, 2)->default(0);
            $table->decimal('profit', 10, 2)->default(0);
            $table->decimal('amount', 10, 2)->default(0);

            $table->string('status')->default('Pending');
            $table->string('vehicle_type')->nullable();
            $table->text('itinerary')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
