<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaMedica extends Model
{
    use HasFactory;
    protected $table = 'consultas_medicas';
    protected $fillable = [
        'cita_medica_id', 
        'medicina_id',
        'diagnostico', 
    ];

    // Relación con CitaMedica
    public function citaMedica()
    {
        return $this->belongsTo(CitaMedica::class);
    }

    // Relación con Medicina
    public function medicina()
    {
        return $this->belongsTo(Medicina::class);
    }
}
