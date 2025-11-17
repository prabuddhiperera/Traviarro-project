<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDaysTable extends Migration
{
    public function up(): void
    {
        Schema::create('tour_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->integer('day_number');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable(); // path to day image
            $table->timestamps();

            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_days');
    }
}
