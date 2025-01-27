<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Doctor;

class DoctorTest extends TestCase
{
    /**
     * Verificar que un modelo Doctor se cree correctamente en memoria.
     */
    public function test_creacion_doctor_en_memoria()
    {
        // Crear un modelo Doctor en memoria
        $doctor = new Doctor([
            'especialidad' => 'Cardiología',
            'departamento' => 'Cardiología'
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('Cardiología', $doctor->especialidad);
        $this->assertEquals('Cardiología', $doctor->departamento);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_doctor()
    {
        // Crear una instancia del modelo Doctor
        $doctor = new Doctor();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['usuario_id', 'especialidad', 'departamento'],
            $doctor->getFillable()
        );
    }
}

class DoctorRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Doctor tiene una relación con Usuario.
     */
    public function test_doctor_tiene_relacion_con_usuario()
    {
        $doctor = new Doctor();

        // Verificar que el método 'usuario' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $doctor->usuario()
        );
    }

    /**
     * Verificar que la entidad Doctor tiene una relación con Recetas.
     */
    public function test_doctor_tiene_relacion_con_recetas()
    {
        $doctor = new Doctor();

        // Verificar que el método 'recetas' existe y es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $doctor->recetas()
        );
    }
}
