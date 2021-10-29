<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function hotels() {
        return $this->belongsToMany(hotel::class, 'hotel_rooms', 'room_id', 'hotel_id');
    }
}
