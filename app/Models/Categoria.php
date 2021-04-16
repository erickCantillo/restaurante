<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function user(){ 
        return $this->belongsTo(\App\Models\User::class);
    }

    public function scopeActive($query) 
    {
        return $query->where('status', 1);
    } 
}
