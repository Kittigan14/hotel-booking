<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitiesTableSeeder extends Seeder
{
    public function run()
    {
        Amenity::create(['name' => 'Wi-Fi']);
        Amenity::create(['name' => 'TV']);
        Amenity::create(['name' => 'Swimming Pool']);
    }
}

