<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'booking_id' => 1,
            'payment_method' => 'credit card',
            'payment_status' => 'success',
            'amount' => 400.00,
            'payment_date' => now(),
        ]);

        Payment::create([
            'booking_id' => 2,
            'payment_method' => 'bank transfer',
            'payment_status' => 'pending',
            'amount' => 750.00,
            'payment_date' => now(),
        ]);
    }
}

