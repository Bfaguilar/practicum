<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Administrador;

class AdministradorTest extends TestCase
{
    /**
     * Verificar que un modelo Administrador se cree correctamente en memoria.
     */
    public function test_creacion_administrador_en_memoria()
    {
        // Crear un modelo Administrador en memoria
        $administrador = new Administrador([
            'cargo' => 'Gerente General',
            'departamento' => 'Recursos Humanos',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('Gerente General', $administrador->cargo);
        $this->assertEquals('Recursos Humanos', $administrador->departamento);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_administrador()
    {
        // Crear una instancia del modelo Administrador
        $administrador = new Administrador();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['usuario_id', 'cargo', 'departamento'],
            $administrador->getFillable()
        );
    }
}

class AdministradorRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Administrador tiene una relación con Usuario.
     */
    public function test_administrador_tiene_relacion_con_usuario()
    {
        $administrador = new Administrador();

        // Verificar que el método 'usuario' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $administrador->usuario()
        );
    }
}
