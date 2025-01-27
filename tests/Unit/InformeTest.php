<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Informe;

class InformeTest extends TestCase
{
    /**
     * Verificar que un modelo Informe se cree correctamente en memoria.
     */
    public function test_creacion_informe_en_memoria()
    {
        // Crear un modelo Informe en memoria
        $informe = new Informe([
            'cita_medica_id' => 1,
            'descripcion' => 'Informe de seguimiento médico.',
            'fecha' => '2025-01-01',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals(1, $informe->cita_medica_id);
        $this->assertEquals('Informe de seguimiento médico.', $informe->descripcion);
        $this->assertEquals('2025-01-01', $informe->fecha);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_informe()
    {
        // Crear una instancia del modelo Informe
        $informe = new Informe();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['cita_medica_id', 'descripcion', 'fecha'],
            $informe->getFillable()
        );
    }
}

class InformeRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Informe tiene una relación con Cita Médica.
     */
    public function test_informe_tiene_relacion_con_cita_medica()
    {
        $informe = new Informe();

        // Verificar que el método 'citaMedica' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $informe->citaMedica()
        );
    }
}
