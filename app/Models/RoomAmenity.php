<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'amenity_id'];

    // ความสัมพันธ์กับ Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // ความสัมพันธ์กับ Amenity
    public function amenity()
    {
        return $this->belongsTo(Amenity::class);
    }
}
