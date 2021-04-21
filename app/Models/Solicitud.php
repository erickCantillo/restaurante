<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre_equipo', 'lugar_trabajo', 'bloque', 'fecha_realizacion', 'fecha_respuesta', 'estado', 'observacion'];

    public function equipo(){ 
        return $this->belongsTo(\App\Models\Equipo::class, 'equipo_id');
    }

    public function user(){ 
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'supervisor_id');
    }

    public function proyecto(){ 
        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto_id');
    }

    public function scopeActive($query) 
    {
        return $query->where('status', 1);
    } 

}
