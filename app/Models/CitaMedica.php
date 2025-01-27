<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaMedica extends Model
{
    use HasFactory;
    protected $table = 'citas_medicas';
    protected $fillable =[
        'fecha',
        'hora',
        'paciente_id',
        'doctor_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Relación inversa con Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relación con Informes
    public function informes()
    {
        return $this->hasMany(Informe::class);
    }

    public function consultaMedica()
{
    return $this->hasOne(ConsultaMedica::class);
}
}