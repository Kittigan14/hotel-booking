<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;

class TypeControllerApi extends Controller
{
    public function type_list() {
        $types = RoomType::all();
        return response()->json(['ok' => true, 'roomTypes' => $types]);
    }
}
