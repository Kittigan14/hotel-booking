<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomAmenity;

class RoomAmenitiesTableSeeder extends Seeder
{
    public function run()
    {
        RoomAmenity::create(['room_id' => 1, 'amenity_id' => 1]); // Room 101 - Wi-Fi
        RoomAmenity::create(['room_id' => 1, 'amenity_id' => 2]); // Room 101 - TV
        RoomAmenity::create(['room_id' => 2, 'amenity_id' => 1]); // Room 102 - Wi-Fi
        RoomAmenity::create(['room_id' => 2, 'amenity_id' => 3]); // Room 102 - Swimming Pool
    }
}
