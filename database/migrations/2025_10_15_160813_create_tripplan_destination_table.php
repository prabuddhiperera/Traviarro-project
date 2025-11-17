<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tripplan_destination', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_plan_id')->constrained()->onDelete('cascade');
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('tripplan_destination');
    }
};
