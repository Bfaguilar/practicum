<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Paciente;

class PacienteTest extends TestCase
{
    /**
     * Verificar que un modelo Paciente se cree correctamente en memoria.
     */
    public function test_creacion_paciente_en_memoria()
    {
        // Crear un modelo Paciente en memoria
        $paciente = new Paciente([
            'usuario_id' => 1,
            'fecha_nacimiento' => '1990-05-10',
            'direccion' => '123 Calle Principal',
            'telefono' => '555-1234',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals(1, $paciente->usuario_id);
        $this->assertEquals('1990-05-10', $paciente->fecha_nacimiento);
        $this->assertEquals('123 Calle Principal', $paciente->direccion);
        $this->assertEquals('555-1234', $paciente->telefono);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_paciente()
    {
        // Crear una instancia del modelo Paciente
        $paciente = new Paciente();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['usuario_id', 'fecha_nacimiento', 'direccion', 'telefono'],
            $paciente->getFillable()
        );
    }
}

class PacienteRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Paciente tiene una relación con Usuario.
     */
    public function test_paciente_tiene_relacion_con_usuario()
    {
        $paciente = new Paciente();

        // Verificar que el método 'usuario' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $paciente->usuario()
        );
    }

    /**
     * Verificar que la entidad Paciente tiene una relación con HistorialMedico.
     */
    public function test_paciente_tiene_relacion_con_historiales_medicos()
    {
        $paciente = new Paciente();

        // Verificar que el método 'historialesMedicos' existe y es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $paciente->historialesMedicos()
        );
    }

    /**
     * Verificar que la entidad Paciente tiene una relación con Recetas.
     */
    public function test_paciente_tiene_relacion_con_recetas()
    {
        $paciente = new Paciente();

        // Verificar que el método 'recetas' existe y es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $paciente->recetas()
        );
    }
}
