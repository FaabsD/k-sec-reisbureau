<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotel_rooms')->insert([
            'hotel_id' => 1,
            'room_id' => 1,
        ]);

        DB::table('hotel_rooms')->insert([
            'hotel_id' => 1,
            'room_id' => 2,
        ]);

        DB::table('hotel_rooms')->insert([
            'hotel_id' => 1,
            'room_id' => 3,
        ]);
    }
}
