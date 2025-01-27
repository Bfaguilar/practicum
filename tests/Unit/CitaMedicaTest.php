<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CitaMedica;

class CitaMedicaTest extends TestCase
{
    /**
     * Verificar que un modelo CitaMedica se cree correctamente en memoria.
     */
    public function test_creacion_cita_medica_en_memoria()
    {
        // Crear un modelo CitaMedica en memoria
        $citaMedica = new CitaMedica([
            'fecha' => '2025-01-01',
            'hora' => '10:00:00',
            'paciente_id' => 1,
            'doctor_id' => 2,
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('2025-01-01', $citaMedica->fecha);
        $this->assertEquals('10:00:00', $citaMedica->hora);
        $this->assertEquals(1, $citaMedica->paciente_id);
        $this->assertEquals(2, $citaMedica->doctor_id);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_cita_medica()
    {
        // Crear una instancia del modelo CitaMedica
        $citaMedica = new CitaMedica();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['fecha', 'hora', 'paciente_id', 'doctor_id'],
            $citaMedica->getFillable()
        );
    }
}

class CitaMedicaRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad CitaMedica tiene una relación con Paciente.
     */
    public function test_cita_medica_tiene_relacion_con_paciente()
    {
        $citaMedica = new CitaMedica();

        // Verificar que el método 'paciente' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $citaMedica->paciente()
        );
    }

    /**
     * Verificar que la entidad CitaMedica tiene una relación con Doctor.
     */
    public function test_cita_medica_tiene_relacion_con_doctor()
    {
        $citaMedica = new CitaMedica();

        // Verificar que el método 'doctor' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $citaMedica->doctor()
        );
    }

    /**
     * Verificar que la entidad CitaMedica tiene una relación con Informe.
     */
    public function test_cita_medica_tiene_relacion_con_informe()
    {
        $citaMedica = new CitaMedica();

        // Verificar que el método 'informe' existe y es una instancia de HasOne
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasOne::class,
            $citaMedica->informe()
        );
    }
}
