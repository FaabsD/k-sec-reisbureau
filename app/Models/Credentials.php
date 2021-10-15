<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function hotel() {
        return $this->belongsTo(hotel::class);
    }
}
