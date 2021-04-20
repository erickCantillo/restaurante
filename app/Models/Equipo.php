<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function categoria(){ 
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    public function scopeActive($query) 
    {
        return $query->where('status', 1);
    } 
}
