<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->decimal('total_price', 15, 2)->change();
        $table->decimal('revenue', 15, 2)->change();
        $table->decimal('profit', 15, 2)->change();
        $table->decimal('amount', 15, 2)->change();
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->decimal('total_price', 10, 2)->change();
        $table->decimal('revenue', 10, 2)->change();
        $table->decimal('profit', 10, 2)->change();
        $table->decimal('amount', 10, 2)->change();
    });
}

};
