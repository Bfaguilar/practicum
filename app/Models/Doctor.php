<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctores';
    protected $fillable =[
        
        'usuario_id',
        'especialidad',
        'departamento',
    ];

    // Relación inversa con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
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
