<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'API_key',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
