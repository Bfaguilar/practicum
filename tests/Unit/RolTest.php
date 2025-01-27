<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Rol;

class RolTest extends TestCase
{
    /**
     * Verificar que un modelo Rol se cree correctamente en memoria.
     */
    public function test_creacion_rol_en_memoria()
    {
        // Crear un modelo Rol en memoria
        $rol = new Rol([
            'nombre' => 'Administrador',
            'descripcion' => 'Tiene acceso completo al sistema.',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('Administrador', $rol->nombre);
        $this->assertEquals('Tiene acceso completo al sistema.', $rol->descripcion);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_rol()
    {
        // Crear una instancia del modelo Rol
        $rol = new Rol();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['nombre', 'descripcion'],
            $rol->getFillable()
        );
    }
}

class RolRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Rol tiene una relación con Usuario.
     */
    public function test_rol_tiene_relacion_con_usuario()
    {
        $rol = new Rol();

        // Verificar que el método 'usuarios' existe y es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $rol->usuarios()
        );
    }
}