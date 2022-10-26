<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['subtotal', 'iva', 'total'];
    
    public function prendas()
    {
        return $this->belongsToMany(Prenda::class);
    }
}