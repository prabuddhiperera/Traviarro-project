<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    public function run()
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('tours')->insert([
            'id' => 1,
            'admin_id' => 0, // dummy value since we are not adding an admin yet
            'name' => 'Family Getaway Tour',
            'destination_id' => 1, // adjust as needed
            'price' => 2500,
            'description' => '15 Days & 14 Nights exploring Sri Lanka’s best destinations: Negombo, Sigiriya, Kandy, Nuwara Eliya, Ella, Yala, Mirissa, Ahangama, Bentota, Colombo.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
