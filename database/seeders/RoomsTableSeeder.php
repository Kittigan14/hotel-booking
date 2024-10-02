<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        Room::create([
            'room_number' => '101',
            'room_type_id' => 1, // Single Room
            'price' => 100.00,
            'availability_status' => true,
            'description' => 'Single room with sea view',
            'image' => 'single_room.jpg',
        ]);

        Room::create([
            'room_number' => '102',
            'room_type_id' => 2, // Double Room
            'price' => 150.00,
            'availability_status' => true,
            'description' => 'Double room with balcony',
            'image' => 'double_room.jpg',
        ]);
    }
}

