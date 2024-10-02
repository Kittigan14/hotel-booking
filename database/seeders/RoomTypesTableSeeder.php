<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypesTableSeeder extends Seeder
{
    public function run()
    {
        // RoomType::create(['type_name' => 'Single Room', 'description' => 'One single bed']);
        // RoomType::create(['type_name' => 'Double Room', 'description' => 'Two single beds']);
        RoomType::create(['type_name' => 'Suite', 'description' => 'Luxury suite with multiple rooms']);
    }
}

