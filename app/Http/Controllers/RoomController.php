<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{

    var $rp = 10;

    public function index() {   
        $rooms = Room::paginate($this->rp);
        return view('room/index', compact('rooms'));
    }

    public function search(Request $request) {
        $query = $request->q;
    
        if ($query) {
            $rooms = Room::where('room_number', 'like', '%'.$query.'%')
                ->orWhereHas('roomType', function($q) use ($query) {
                    $q->where('type_name', 'like', '%'.$query.'%');
                })
                ->paginate($this->rp);
        } else {
            $rooms = Room::paginate($this->rp);
        }
    
        return view('room.index', compact('rooms'));
    }

    public function edit($id = null) {
        $types = RoomType::pluck('type_name', 'id')->prepend('Select item', '');
        $room = Room::find($id);

        if ($id) {
            $room = Room::where('id', $id)->first();
            return view('room/edit')
                ->with('room', $room)
                ->with('types', $types);
        } else {
            return view('room/add')
                ->with('types', $types);
        };
        
    }
    
    public function update(Request $request) {
        $rules = [
            'room_number' => 'required',
            'description' => 'required',
            'room_type_id' => 'required|numeric',
            'price' => 'numeric',
            'availability_status' => 'required|boolean'
        ];
    
        $messages = [
            'required' => 'Please fill in information :attribute completely',
            'numeric' => 'Please fill in information :attribute to be a number',
            'availability_status.required' => 'Please select room status.',
            // 'availability_status.boolean' => 'สถานะห้องพักต้องเป็นค่า True หรือ False',
        ];
    
        $id = $request->id;
        $temp = [
            'room_number' => $request->room_number,
            'description' => $request->description,
            'room_type_id' => $request->room_type_id,
            'price' => $request->price,
            'availability_status' => $request->availability_status,
        ];
    
        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('room/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $room = Room::find($id);
        $room->room_number = $request->room_number;
        $room->description = $request->description;
        $room->room_type_id = $request->room_type_id;
        $room->price = $request->price;
        $room->availability_status = $request->availability_status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $upload_to = 'upload/images';
            $relative_path = $upload_to . '/' . $file->getClientOriginalName();
            $absolute_path = public_path($upload_to);
            $file->move($absolute_path, $file->getClientOriginalName());

            Image::make(public_path($relative_path))->resize(320, 250)->save();

            $room->image = $relative_path;
        }
    
        $room->save();

        return redirect('room')
        ->with('ok', true)
        ->with('msg', 'The information has been recorded successfully.');
    }

    public function insert(Request $request) {
        $rules = [
            'room_number' => 'required|numeric',
            'description' => 'required',
            'room_type_id' => 'required|numeric',
            'price' => 'numeric',
            'availability_status' => 'required|boolean'
        ];
        
        $messages = [
           'required' => 'Please fill in information :attribute completely',
            'numeric' => 'Please fill in information :attribute to be a number',
            'availability_status.required' => 'Please select room status.',
            // 'availability_status.boolean' => 'สถานะห้องพักต้องเป็นค่า True หรือ False',
        ];
        
        $temp = [
            'room_number' => $request->room_number,
            'description' => $request->description,
            'room_type_id' => $request->room_type_id,
            'price' => $request->price,
            'availability_status' => $request->availability_status,
        ];
        
        $id = $request->id;
        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect('room/edit/'. $id)
            ->withErrors($validator)
            ->withInput();
        }
    
        $room = new Room();
        $room->room_number = $request->room_number;
        $room->description = $request->description;
        $room->room_type_id = $request->room_type_id;
        $room->price = $request->price;
        $room->availability_status = $request->availability_status;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $upload_to = 'upload/images';
            $relative_path = $upload_to . '/' . $file->getClientOriginalName();
            $absolute_path = public_path($upload_to);
            $file->move($absolute_path, $file->getClientOriginalName());
    
            Image::make(public_path($relative_path))->resize(320, 250)->save();
    
            $room->image = $relative_path;
        }
    
        $room->save();
    
        return redirect('room')
        ->with('ok', true)
        ->with('msg', 'Information added successfully');
    }

    public function remove($id) {
        Room::find($id)->delete();
        return redirect('room')
        ->with('ok', true)
        ->with('msg', 'Data deleted successfully');
    }
}