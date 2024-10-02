<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        Booking::create([
            'user_id' => 1, // John Doe
            'room_id' => 1, // Room 101
            'check_in_date' => '2024-10-01',
            'check_out_date' => '2024-10-05',
            'total_price' => 400.00,
            'booking_status' => 'confirmed',
        ]);

        Booking::create([
            'user_id' => 2, // Jane Smith
            'room_id' => 2, // Room 102
            'check_in_date' => '2024-10-10',
            'check_out_date' => '2024-10-15',
            'total_price' => 750.00,
            'booking_status' => 'pending',
        ]);
    }
}

