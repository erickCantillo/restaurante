<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['lugar_trabajo', 'sistema', 'bloque', 'observacion', 'almacenista_recibe', 'fecha_prestamo', 'fecha_devolucion_prevista', 'fecha_devolucion', 'estado'];

    public function equipo(){ 
        return $this->belongsTo(\App\Models\Equipo::class, 'equipo_id');
    }

    public function user(){ 
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function proyecto(){ 
        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto_id');
    }

    public function supervisor(){ 
       return $this->belongsTo(\App\Models\User::class, 'supervisor_id');
   }
    
    public function scopeActive($query) 
    {
        return $query->where('status', 1);
    } 

}
