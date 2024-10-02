<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomControllerApi extends Controller
{
    public function room_list($room_type_id = null)
    {
        if ($room_type_id) $rooms = Room::where('room_type_id', $room_type_id)->get();
        else $rooms = Room::all();

        return response()->json(['ok' => true, 'rooms' => $rooms]);
    }

    public function room_search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $rooms = Room::where('description', 'LIKE', "%{$query}%")
                ->orWhere('room_number', 'LIKE', "%{$query}%")
                ->get();
        } else $rooms = Room::all();

        return response()->json(['ok' => true, 'rooms' => $rooms]);
    }
}
