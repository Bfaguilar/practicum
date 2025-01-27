<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;
    protected $table = 'historiales_medicos';
    protected $fillable = [
        'paciente_id', 
        'descripcion', 
        'fecha',
    ];

    // Relación con Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
