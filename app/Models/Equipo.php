<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['codigo_interno', 'serial', 'codigo_SAP', 'valor_compra', 'ubicacion', 'marca', 'fabricante', 'fecha_ingreso', 'valor_dia', 'responsable', 'observaciones', 'estado', 'tipo', 'imagen'];

    public function categoria(){ 
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id');
    }

    public function scopeActive($query) 
    {
        return $query->where('status', 1);
    } 
}
