<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    use HasFactory;
    protected $table = 'medicinas';
    protected $fillable = [
        'nombre',
        'marca',
        'descripcion',
    ];

    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }   

    public function consultasMedicas()
{
    return $this->hasMany(ConsultaMedica::class);
}
}
