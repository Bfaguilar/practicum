<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    protected $table = 'recetas';
    protected $fillable = ['paciente_id', 
        'doctor_id', 
        'medicina_id', 
        'dosis',
    ];

    // Relación con Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Relación con Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relación con Medicina
    public function medicina()
    {
        return $this->belongsTo(Medicina::class);
    }
}
