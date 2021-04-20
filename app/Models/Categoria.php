<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nivel','name','imagen', 'categoria_id','status'];

    public function user(){ 
        return $this->belongsTo(\App\Models\User::class);
    }

    public function padre(){ 
        return $this->belongsTo(\App\Models\Categoria::class , 'categoria_id');
    }

    public function scopeActive($query) 
    {
        return $query->where('status', 1);
    } 
}
