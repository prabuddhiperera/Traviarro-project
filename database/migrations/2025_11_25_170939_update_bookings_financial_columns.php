<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('total_price', 15, 2)->change();
            $table->decimal('payout', 15, 2)->change();
            $table->decimal('profit', 15, 2)->change();
            $table->decimal('amount', 15, 2)->change();
            $table->decimal('revenue', 15, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('total_price')->change();
            $table->integer('payout')->change();
            $table->integer('profit')->change();
            $table->integer('amount')->change();
            $table->integer('revenue')->change();
        });
    }
};
