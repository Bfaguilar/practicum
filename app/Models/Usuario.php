<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'correo',
    ];

     // Relación con Administradores
     public function administrador()
     {
         return $this->hasOne(Administrador::class);
     }
 
     // Relación con Pacientes
     public function paciente()
     {
         return $this->hasOne(Paciente::class);
     }
 
     // Relación con Doctores
     public function doctor()
     {
         return $this->hasOne(Doctor::class);
     }

     public function rol()
     {
         return $this->belongsTo(Rol::class);
     }
 
}