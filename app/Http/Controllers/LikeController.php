<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function viewLike() {
        $like_items = Session::get('like_items', []);
        return view('like/index', compact('like_items'));
    }
    

    public function addToLike($id) {
        $room = Room::with('roomType')->find($id);
        $like_items = Session::get('like_items', []);
    
        $qty = 0;
        if (array_key_exists($room->id, $like_items)) $qty = $like_items[$room->id]['qty'];
    
        $like_items[$room->id] = 
        [
            'id' => $room->id,
            'room_number' => $room->room_number,
            'room_type_id' => $room->room_type_id,
            'room_type_name' => $room->roomType ? $room->roomType->type_name : 'ไม่มีประเภทห้อง',
            'price' => $room->price,
            'image' => $room->image,
            'qty' => $qty + 1,
        ];
    
        Session::put('like_items', $like_items);
        
        return redirect('like/view');
    }

    public function updateQty($id, $qty) {
        $like_items = Session::get('like_items');
        $like_items[$id]['qty'] = $qty;
    
        Session::put('like_items', $like_items);
        return redirect('like/view');
    }
    

    public function deletelike($id) {
        $like_items = Session::get('like_items');
        unset($like_items[$id]);
        
        Session::put('like_items', $like_items);
        return redirect('like/view');
    }
}
