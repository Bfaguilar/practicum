<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'usuario_id',
        'fecha_nacimiento', 
        'direccion', 
        'telefono'
    ];

    // Relación inversa con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con Historiales Médicos
    public function historialesMedicos()
    {
        return $this->hasMany(HistorialMedico::class);
    }

    // Relación con Recetas
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    } 

    public function citasMedicas()
{
    return $this->hasMany(CitaMedica::class);
}
}