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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable(); // admin managing destination
            $table->string('name');        // e.g., "Sigiriya Rock"
            $table->string('city');        // e.g., "Sigiriya"
            // $table->string('province')->nullable(); // removed
            $table->text('description')->nullable();
            // $table->text('places_to_visit')->nullable(); // new column for places
            // $table->text('things_to_do')->nullable();    // new column for activities
            $table->string('image')->nullable();         // destination image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
