<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\HistorialMedico;

class HistorialMedicoTest extends TestCase
{
    /**
     * Verificar que un modelo HistorialMedico se cree correctamente en memoria.
     */
    public function test_creacion_historial_medico_en_memoria()
    {
        // Crear un modelo HistorialMedico en memoria
        $historial = new HistorialMedico([
            'paciente_id' => 1,
            'descripcion' => 'Consulta médica por fiebre alta.',
            'fecha' => '2023-01-01',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals(1, $historial->paciente_id);
        $this->assertEquals('Consulta médica por fiebre alta.', $historial->descripcion);
        $this->assertEquals('2023-01-01', $historial->fecha);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_historial_medico()
    {
        // Crear una instancia del modelo HistorialMedico
        $historial = new HistorialMedico();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['paciente_id', 'descripcion', 'fecha'],
            $historial->getFillable()
        );
    }
}

class HistorialMedicoRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad HistorialMedico tiene una relación con Paciente.
     */
    public function test_historial_medico_tiene_relacion_con_paciente()
    {
        $historial = new HistorialMedico();

        // Verificar que el método 'paciente' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $historial->paciente()
        );
    }
}
