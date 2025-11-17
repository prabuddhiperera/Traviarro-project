<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->date('travel_date')->nullable()->after('booking_date');
        $table->decimal('revenue', 10, 2)->default(0)->after('total_price');
        $table->decimal('profit', 10, 2)->default(0)->after('revenue');
    });
}

public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['travel_date', 'revenue', 'profit']);
    });
}

};
