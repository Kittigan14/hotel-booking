<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);
        return view('bookings.create', compact('room'));
    }


    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'กรุณาล็อกอินก่อนทำการจองห้องพัก');
        }

        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
            'booking_status' => 'required|in:confirmed,pending',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $request->total_price,
            'booking_status' => $request->booking_status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }
}
