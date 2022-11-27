<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio_noche', 'descripcion', 'numero_personas', 'numero_camas', 'tipo_cama'];
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
