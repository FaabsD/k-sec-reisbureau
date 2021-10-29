<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function rooms() {
        return $this->belongsToMany(Rooms::class, 'hotel_rooms', 'room_id', 'hotel_id');
    }
    public function credentials() {
        return $this->hasOne(Credentials::class);
    }
}
