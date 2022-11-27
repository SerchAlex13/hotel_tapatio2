<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['ubicacion', 'nombre_original', 'mime'];
    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
