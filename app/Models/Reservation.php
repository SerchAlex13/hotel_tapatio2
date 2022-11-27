<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'fecha_inicio', 'fecha_fin', 'noches', 'precio'];

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
