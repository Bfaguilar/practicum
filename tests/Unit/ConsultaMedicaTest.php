<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ConsultaMedica;

class ConsultaMedicaTest extends TestCase
{
    /**
     * Verificar que un modelo ConsultaMedica se cree correctamente en memoria.
     */
    public function test_creacion_consulta_medica_en_memoria()
    {
        // Crear un modelo ConsultaMedica en memoria
        $consulta = new ConsultaMedica([
            'diagnostico' => 'Inflamación severa',
            'cita_medica_id' => 1,
            'medicina_id' => 1,
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('Inflamación severa', $consulta->diagnostico);
        $this->assertEquals(1, $consulta->cita_medica_id);
        $this->assertEquals(1, $consulta->medicina_id);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_consulta_medica()
    {
        // Crear una instancia del modelo ConsultaMedica
        $consulta = new ConsultaMedica();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['diagnostico', 'cita_medica_id', 'medicina_id'],
            $consulta->getFillable()
        );
    }
}

class ConsultaMedicaRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad ConsultaMedica tiene una relación con CitaMedica.
     */
    public function test_consulta_medica_tiene_relacion_con_cita_medica()
    {
        $consulta = new ConsultaMedica();

        // Verificar que el método 'citaMedica' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $consulta->citaMedica()
        );
    }

    /**
     * Verificar que la entidad ConsultaMedica tiene una relación con Medicina.
     */
    public function test_consulta_medica_tiene_relacion_con_medicina()
    {
        $consulta = new ConsultaMedica();

        // Verificar que el método 'medicina' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $consulta->medicina()
        );
    }
}
