<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Usuario;

class UsuarioTest extends TestCase
{
    /**
     * Verificar que un modelo Usuario se cree correctamente en memoria.
     */
    public function test_creacion_usuario_en_memoria()
    {
        // Crear un modelo Usuario en memoria
        $usuario = new Usuario([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan.perez@example.com',
            
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('Juan', $usuario->nombre);
        $this->assertEquals('Pérez', $usuario->apellido);
        $this->assertEquals('juan.perez@example.com', $usuario->correo);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_usuario()
    {
        // Crear una instancia del modelo Usuario
        $usuario = new Usuario();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['nombre', 'apellido', 'email','fecha_nacimiento', 'dirección', 'telefono', 'correo'],
            $usuario->getFillable()
        );
    }
}

class UsuarioRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Usuario tiene una relación con Rol.
     */
    public function test_usuario_tiene_relacion_con_rol()
    {
        $usuario = new Usuario();

        // Verificar que el método 'rol' existe y es una instancia de BelongsTo
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $usuario->rol()
        );
    }

    /**
     * Verificar que la entidad Usuario tiene una relación con Citas Médicas.
     */
    public function test_usuario_tiene_relacion_con_citas_medicas()
    {
        $usuario = new Usuario();

        // Verificar que el método 'citasMedicas' existe y es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $usuario->citasMedicas()
        );
    }
}
