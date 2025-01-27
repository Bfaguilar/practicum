<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $table = 'informes';
    protected $fillable = [
        'cita_medica_id', 
        'descripcion', 
        'fecha',
    ];

    // Relación con Cita Médica
    public function citaMedica()
    {
        return $this->belongsTo(CitaMedica::class);
    }
}
