<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'room_name' => 'Basis suite',
            'location' => 'Barcelona',
            'price' => '177',
            'details' => '...',
            'reserved' => false,
        ]);

        DB::table('rooms')->insert([
            'room_name' => 'Aqua suite',
            'location' => 'Berlijn',
            'price' => '174',
            'details' => '...',
            'reserved' => false,
        ]);

        DB::table('rooms')->insert([
            'room_name' => 'Extended suite',
            'location' => 'Parijs',
            'price' => '196',
            'details' => '...',
            'reserved' => false,
        ]);
    }
}
