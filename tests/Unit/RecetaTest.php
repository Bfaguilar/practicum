<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Receta;

class RecetaTest extends TestCase
{
    /**
     * Verificar que un modelo Receta se cree correctamente en memoria.
     */
    public function test_creacion_receta_en_memoria()
    {
        // Crear un modelo Receta en memoria
        $receta = new Receta([
            'paciente_id' => 1,
            'doctor_id' => 1,
            'medicina_id' => 1,
            'dosis' => '2 veces al día',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals(1, $receta->paciente_id);
        $this->assertEquals(1, $receta->doctor_id);
        $this->assertEquals(1, $receta->medicina_id);
        $this->assertEquals('2 veces al día', $receta->dosis);
    }

    /**
     * Verificar que los fillables estén correctos.
     */
    public function test_fillable_receta()
    {
        // Crear una instancia del modelo Receta
        $receta = new Receta();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['paciente_id', 'doctor_id', 'medicina_id', 'dosis'],
            $receta->getFillable()
        );
    }
}

class RecetaRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Receta tiene una relación con Paciente.
     */
    public function test_receta_tiene_relacion_con_paciente()
    {
        $receta = new Receta();

        // Verificar que el método 'paciente' existe y es una instancia de belongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $receta->paciente()
        );
    }

    /**
     * Verificar que la entidad Receta tiene una relación con Doctor.
     */
    public function test_receta_tiene_relacion_con_doctor()
    {
        $receta = new Receta();

        // Verificar que el método 'doctor' existe y es una instancia de belongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $receta->doctor()
        );
    }

    /**
     * Verificar que la entidad Receta tiene una relación con Medicina.
     */
    public function test_receta_tiene_relacion_con_medicina()
    {
        $receta = new Receta();

        // Verificar que el método 'medicina' existe y es una instancia de belongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $receta->medicina()
        );
    }
}
